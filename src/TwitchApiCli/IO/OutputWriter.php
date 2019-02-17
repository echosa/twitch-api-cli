<?php

declare(strict_types=1);

namespace TwitchApiCli\IO;

class OutputWriter
{
    public function write(string $message): void
    {
        echo $message;
    }
}
