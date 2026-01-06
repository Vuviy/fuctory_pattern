<?php

namespace App\Client;

use App\Command\SendMessageCommand;
use App\Logger\FileLogger;
use App\MessageFactory;
use App\Queue\Queue;
use App\Queue\QueueWorker;

class ClientController
{
    public function doSomething()
    {
        $sendBy = 'email';

        $queue = new Queue();

        $message = MessageFactory::create($sendBy, [
            'email'   => 'test@example.com',
            'message' => 'Hello world',
        ]);

        $commandEmail = new SendMessageCommand($message);

        $queue->push($commandEmail);

        $logger = new FileLogger();

        $worker = new QueueWorker($queue, $logger);
        $worker->run();
    }
}