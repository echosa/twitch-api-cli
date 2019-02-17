<?php

namespace spec\TwitchApiCli\CliEndpoints;

use NewTwitchApi\NewTwitchApi;
use NewTwitchApi\Resources\WebhooksApi;
use PhpSpec\ObjectBehavior;
use TwitchApiCli\IO\InputOutput;
use TwitchApiCli\IO\InputReader;
use TwitchApiCli\IO\OutputWriter;

class GetWebhookSubscriptionsCliEndpointSpec extends ObjectBehavior
{
    function let(NewTwitchApi $newTwitchApi, InputOutput $inputOutput, InputReader $inputReader, OutputWriter $outputWriter)
    {
        $inputOutput->getInputReader()->willReturn($inputReader);
        $inputOutput->getOutputWriter()->willReturn($outputWriter);
        $this->beConstructedWith($newTwitchApi, $inputOutput);
    }

    function it_should_have_correct_name()
    {
        $this->getName()->shouldReturn('Get Webhook Subscriptions for User');
    }

    function is_should_get_webhook_subscriptions_for_user_access_token(NewTwitchApi $newTwitchApi, InputReader $inputReader, WebhooksApi $webhooksApi)
    {
        $webhooksApi->getWebhookSubscriptions('access-token')->shouldBeCalled();
        $newTwitchApi->getUsersApi()->willReturn($webhooksApi);
        $inputReader->readFromStdin()->willReturn('access-token', null);
        $inputReader->readIntFromStdin()->willReturn(null);

        $this->execute();
    }
}
