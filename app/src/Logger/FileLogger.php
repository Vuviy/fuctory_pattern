<?php

namespace App\Logger;

final class FileLogger implements LoggerInterface
{
    public function info(string $message, array $context = []): void
    {
        $this->write('INFO', $message, $context);
    }

    public function error(string $message, array $context = []): void
    {
        $this->write('ERROR', $message, $context);
    }

    private function write(string $level, string $message, array $context): void
    {
        file_put_contents(
            __DIR__ . '/../../logs/app.log',
            sprintf("[%s] %s %s\n", $level, $message, json_encode($context)),
            FILE_APPEND
        );
    }
}