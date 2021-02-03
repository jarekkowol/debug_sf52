<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email as SymfonyEmail;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @Route("/registration", name="registration")
     */
    public function index(): Response
    {
        $email = (new SymfonyEmail())
            ->from("test_from@test.pl")
            ->to("test_to@test.pl")
            ->subject("Subject")
            ->text("Text")
            ->html("Html");

        $this->mailer->send($email);

        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RegistrationController.php',
        ]);
    }
}
