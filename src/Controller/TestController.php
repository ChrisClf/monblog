<?php

namespace App\Controller;

use Symfony\Component\Mime\Email;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class TestController extends AbstractController
{
    #[Route('/test', name: 'app_test')]
    public function index(MailerInterface $mailer): Response
    {

        $task = $formulaire->getData();
        $email = (new Email())
        ->from($task['email'])
        ->to('you@example.com')
        //->cc('cc@example.com')
        //->bcc('bcc@example.com')
        //->replyTo('fabien@example.com')
        //->priority(Email::PRIORITY_HIGH)
        ->subject($task["nom"])
        ->text($task['sujet'])
        ->html($task['sujet']);

        $mailer->send($email);

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
        ]);
    }
}