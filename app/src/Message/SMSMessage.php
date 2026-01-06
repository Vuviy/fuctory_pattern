<?php

namespace App\Message;

use InvalidArgumentException;

class SMSMessage implements MessageInterface
{
    public function __construct( private array $params) {}
    public function send(): void
    {
        $this->validate();

        echo "Sending sms message...\n";
    }

    public function validate(): void
    {
        if (!array_key_exists('phone', $this->params)) {
            throw new InvalidArgumentException('Phone is required');
        }

        if (!preg_match('/^\+\d{10,15}$/', $this->params['phone'])) {
            throw new InvalidArgumentException('Invalid phone format');
        }

        if (!array_key_exists('message', $this->params)) {
            throw new InvalidArgumentException('Message is required');
        }
    }
}