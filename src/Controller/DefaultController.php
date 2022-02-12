<?php

namespace App\Controller;

use App\Message\TestMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;

class DefaultController extends AbstractController
{
    public function index(): Response
    {
        return $this->render('default/index.html.twig');
    }

    public function startQueue(MessageBusInterface $messageBus)
    {
        $message = new TestMessage('Random number: ' . rand(0, 100000));
        $messageBus->dispatch($message);

        return $this->redirectToRoute('index');
    }

    public function receiver(): Response
    {
        return $this->render('default/receiver.html.twig');
    }
}
