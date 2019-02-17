<?php

namespace spec\TwitchApiCli\CliEndpoints;

use NewTwitchApi\NewTwitchApi;
use NewTwitchApi\Resources\StreamsApi;
use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\InputOutput;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

class GetStreamsCliEndpointSpec extends ObjectBehavior
{
    function let(NewTwitchApi $newTwitchApi, InputOutput $inputOutput, InputReader $inputReader, OutputWriter $outputWriter)
    {
        $inputOutput->getInputReader()->willReturn($inputReader);
        $inputOutput->getOutputWriter()->willReturn($outputWriter);
        $this->beConstructedWith($newTwitchApi, $inputOutput);
    }

    function it_should_have_correct_name()
    {
        $this->getName()->shouldReturn('Get Streams');
    }

    function it_should_get_streams(NewTwitchApi $newTwitchApi, InputReader $inputReader, StreamsApi $streamsApi)
    {
        $streamsApi->getStreams(
            [12345, 98765],
            ['user1', 'user2'],
            ['game1', 'game2'],
            ['community1', 'community2'],
            ['language1', 'language2'],
            100,
            'page1',
            'page3'
        )->shouldBeCalled();
        $newTwitchApi->getStreamsApi()->willReturn($streamsApi);
        $inputReader->readCSVIntoArrayFromStdin()->willReturn(
            [12345, 98765],
            ['user1', 'user2'],
            ['game1', 'game2'],
            ['community1', 'community2'],
            ['language1', 'language2']
        );
        $inputReader->readIntFromStdin()->willReturn(100);
        $inputReader->readFromStdin()->willReturn('page1', 'page3');

        $this->execute();
    }
}
