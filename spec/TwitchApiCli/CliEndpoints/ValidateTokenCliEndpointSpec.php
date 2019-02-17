<?php

namespace spec\TwitchApiCli\CliEndpoints;

use NewTwitchApi\Auth\OauthApi;
use NewTwitchApi\NewTwitchApi;
use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\InputOutput;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

class ValidateTokenCliEndpointSpec extends ObjectBehavior
{
    function let(NewTwitchApi $newTwitchApi, InputOutput $inputOutput, InputReader $inputReader, OutputWriter $outputWriter)
    {
        $inputOutput->getInputReader()->willReturn($inputReader);
        $inputOutput->getOutputWriter()->willReturn($outputWriter);
        $this->beConstructedWith($newTwitchApi, $inputOutput);
    }

    function it_should_have_correct_name()
    {
        $this->getName()->shouldReturn('Validate an Access Token');
    }

    function it_should_validate_a_token(NewTwitchApi $newTwitchApi, InputReader $inputReader, OauthApi $oauthApi)
    {
        $oauthApi->validateAccessToken('access-token')->shouldBeCalled();
        $newTwitchApi->getOauthApi()->willReturn($oauthApi);
        $inputReader->readFromStdin()->willReturn('access-token');

        $this->execute();
    }
}
