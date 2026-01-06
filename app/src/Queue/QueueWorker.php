<?php

namespace App\Queue;

use App\Logger\LoggerInterface;

class QueueWorker
{
    public function __construct(
        private QueueInterface  $queue,
        private LoggerInterface $logger
    )
    {
    }

    public function run(): void
    {
        while ($command = $this->queue->pop()) {
            try {
                $this->logger->info('Executing command', [
                    'command' => get_class($command)
                ]);

                $command->execute();

                $this->logger->info('Command executed successfully');
            } catch (\Exception $e) {
                $this->logger->error('Command failed', [
                    'exception' => $e->getMessage()
                ]);
            }
        }
    }
}