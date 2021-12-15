<?php

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class DefaultController extends AbstractController
{
    public function index(MessageBusInterface $messageBus): Response
    {
        $message = new TestMessage("Just testing.");
        $messageBus->dispatch($message);

        Return new Response("Sending message.");
    }
}
