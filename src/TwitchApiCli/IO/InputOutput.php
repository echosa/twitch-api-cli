<?php

declare(strict_types=1);

namespace TwitchApiCli\IO;

class InputOutput
{
    private $inputReader;
    private $outputWriter;

    public function __construct(InputReader $inputReader, OutputWriter $outputWriter)
    {
        $this->inputReader = $inputReader;
        $this->outputWriter = $outputWriter;
    }

    public function getInputReader(): InputReader
    {
        return $this->inputReader;
    }

    public function getOutputWriter(): OutputWriter
    {
        return $this->outputWriter;
    }
}
