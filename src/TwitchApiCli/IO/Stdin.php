<?php

declare(strict_types=1);

namespace TwitchApiCli\IO;

class Stdin
{
    public function read(): string
    {
        return fgets(STDIN);
    }
}
