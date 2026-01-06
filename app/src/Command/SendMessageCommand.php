<?php

namespace App\Command;

use App\Message\MessageInterface;

class SendMessageCommand implements CommandInterface
{
    public function __construct(private MessageInterface $message){}

    public function execute(): void
    {
        $this->message->send();
    }
}