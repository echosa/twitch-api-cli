<?php

declare(strict_types=1);

namespace TwitchApiCli\CliEndpoints;

use Psr\Http\Message\ResponseInterface;
use TwitchApiCli\Exceptions\ExitCliException;

class ExitCliEndpoint extends AbstractCliEndpoint
{
    public function __construct()
    {
        // Don't need Guzzle client to quit
    }

    public function getName(): string
    {
        return 'Quit';
    }

    /** @throws ExitCliException */
    public function execute(): ResponseInterface
    {
        throw new ExitCliException('Exit from CLI client requested.');
    }
}
