<?php

namespace App\Message;

use InvalidArgumentException;

class PushMessage implements MessageInterface
{
    public function __construct(private array $params){}
    public function send(): void
    {
        $this->validate();
        echo "Sending push message...\n";
    }

    public function validate(): void
    {
        if (!array_key_exists('message', $this->params)) {
            throw new InvalidArgumentException('Message is required');
        }
    }
}