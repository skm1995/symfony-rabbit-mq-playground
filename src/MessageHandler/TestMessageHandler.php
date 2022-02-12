<?php

namespace App\MessageHandler;

use App\Message\TestMessage;
use Symfony\Component\Mercure\HubInterface;
use Symfony\Component\Mercure\Update;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class TestMessageHandler implements MessageHandlerInterface
{
    private HubInterface $hub;

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(HubInterface $hub, UrlGeneratorInterface $urlGenerator)
    {
        $this->hub = $hub;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(TestMessage $message)
    {
        $update = new Update(
            $this->urlGenerator->generate('mercure_random_number'),
            json_encode(['message' => $message->getContent()]),
            true
        );
        $this->hub->publish($update);
    }
}
