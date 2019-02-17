<?php

namespace spec\TwitchApiCli\IO;

use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

class InputOutputSpec extends ObjectBehavior
{
    function let(InputReader $inputReader, OutputWriter $outputWriter)
    {
        $this->beConstructedWith($inputReader, $outputWriter);
    }

    function it_should_return_input_reader(InputReader $inputReader)
    {
        $this->getInputReader()->shouldReturn($inputReader);
    }

    function it_should_return_output_writer(OutputWriter $outputWriter)
    {
        $this->getOutputWriter()->shouldReturn($outputWriter);
    }
}
