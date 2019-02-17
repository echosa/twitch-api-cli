<?php

namespace spec\TwitchApiCli\IO;

use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\OutputWriter;

class OutputWriterSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(OutputWriter::class);
    }
}
