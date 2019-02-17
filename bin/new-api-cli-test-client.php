#!/usr/bin/env php
<?php

require __DIR__ . '/../vendor/autoload.php';

use TwitchApiCli\CliClient;

try {
    (new CliClient($argv))->run();
} catch (InvalidArgumentException $e) {
    echo $e->getMessage();
}
