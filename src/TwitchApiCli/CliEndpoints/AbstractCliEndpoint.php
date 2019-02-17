<?php

declare(strict_types=1);

namespace TwitchApiCli\CliEndpoints;

use NewTwitchApi\NewTwitchApi;
use TwitchApiCli\IO\InputOutput;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

abstract class AbstractCliEndpoint implements CliEndpointInterface
{
    private $twitchApi;
    private $inputOutput;

    public function __construct(NewTwitchApi $twitchApi, InputOutput $inputOutput)
    {
        $this->twitchApi = $twitchApi;
        $this->inputOutput = $inputOutput;
    }

    public function getTwitchApi(): NewTwitchApi
    {
        return $this->twitchApi;
    }

    public function getInputReader(): InputReader
    {
        return $this->inputOutput->getInputReader();
    }

    public function getOutputWriter(): OutputWriter
    {
        return $this->inputOutput->getOutputWriter();
    }
}
