<?php

namespace spec\TwitchApiCli\IO;

use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\Stdin;

class StdinSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Stdin::class);
    }
}
