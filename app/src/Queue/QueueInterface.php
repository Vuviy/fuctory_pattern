<?php

namespace App\Queue;

use App\Command\CommandInterface;

interface QueueInterface
{
    public function push(CommandInterface $command): void;
    public function pop(): ?CommandInterface;
}