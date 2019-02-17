<?php

namespace spec\TwitchApiCli\CliEndpoints;

use NewTwitchApi\NewTwitchApi;
use NewTwitchApi\Resources\GamesApi;
use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\InputOutput;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

class GetGamesCliEndpointSpec extends ObjectBehavior
{
    function let(NewTwitchApi $newTwitchApi, InputOutput $inputOutput, InputReader $inputReader, OutputWriter $outputWriter)
    {
        $inputOutput->getInputReader()->willReturn($inputReader);
        $inputOutput->getOutputWriter()->willReturn($outputWriter);
        $this->beConstructedWith($newTwitchApi, $inputOutput);
    }

    function it_should_have_correct_name()
    {
        $this->getName()->shouldReturn('Get Games');
    }

    function it_should_get_games_by_ids_and_names(NewTwitchApi $newTwitchApi, InputReader $inputReader, GamesApi $gamesApi)
    {
        $gamesApi->getGames([12345, 98765], ['game1', 'game2'])->shouldBeCalled();
        $newTwitchApi->getGamesApi()->willReturn($gamesApi);
        $inputReader->readCSVIntoArrayFromStdin()->willReturn([12345, 98765], ['game1', 'game2']);

        $this->execute();
    }
}
