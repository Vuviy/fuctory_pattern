<?php

namespace App\Message;

use InvalidArgumentException;

class EmailMessage implements MessageInterface
{
    public function __construct(private array $params){}

    public function send(): void
    {
        $this->validate();
        echo "Sending email message...\n";
    }

    public function validate(): void
    {
        if (empty($this->params['email'])) {
            throw new InvalidArgumentException('Email is required');
        }

        if (!filter_var($this->params['email'], FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('Invalid email format');
        }

        if (!array_key_exists('message', $this->params)) {
            throw new InvalidArgumentException('Message is required');
        }
    }
}