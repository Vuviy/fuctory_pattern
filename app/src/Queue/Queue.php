<?php

namespace App\Queue;

use App\Command\CommandInterface;

class Queue implements QueueInterface
{
    private array $queue = [];
    public function push(CommandInterface $command): void
    {
        $this->queue[] = $command;
    }

    public function pop(): ?CommandInterface
    {
        return array_shift($this->queue);
    }
}