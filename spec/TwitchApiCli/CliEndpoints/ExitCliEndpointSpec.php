<?php

namespace spec\TwitchApiCli\CliEndpoints;

use PhpSpec\ObjectBehavior;
use TwitchApiCli\Exceptions\ExitCliException;

class ExitCliEndpointSpec extends ObjectBehavior
{
    function it_should_have_correct_name()
    {
        $this->getName()->shouldReturn('Quit');
    }

    function it_should_throw_exception_to_exit_cli()
    {
        $this->shouldThrow(ExitCliException::class)->during('execute');
    }
}
