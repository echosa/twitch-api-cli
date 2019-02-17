<?php

declare(strict_types=1);

namespace TwitchApiCli\CliEndpoints;

use GuzzleHttp\Exception\GuzzleException;
use Psr\Http\Message\ResponseInterface;
use TwitchApiCli\Exceptions\ExitCliException;

interface CliEndpointInterface
{
    public function getName(): string;
    /**
     * @throws ExitCliException
     * @throws GuzzleException
     */
    public function execute(): ResponseInterface;
}
