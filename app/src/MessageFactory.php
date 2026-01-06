<?php

namespace App;

use App\Message\EmailMessage;
use App\Message\SMSMessage;
use App\Message\PushMessage;
use App\Message\SlackMessage;
use App\Message\MessageInterface;
use InvalidArgumentException;

class MessageFactory
{
    public static function create(string $type, array $params): MessageInterface
    {
        return match ($type) {
            'email' => new EmailMessage($params),
            'sms' => new SMSMessage($params),
            'push' => new PushMessage($params),
            'slack' => new SlackMessage($params),
            default => throw new InvalidArgumentException("Unknown message type"),
        };
    }
}