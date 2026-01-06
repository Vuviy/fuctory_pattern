<?php

namespace App\Message;

interface MessageInterface
{
    public function send(): void;

    public function validate(): void;
}