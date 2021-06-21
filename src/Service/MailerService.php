<?php

namespace App\Service;

use App\Service\GlobalService;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class MailerService
{
    private $mailer;
    private $globals;

    public function __construct(MailerInterface $mailer, GlobalService $globals)
    {
        $this->mailer = $mailer;
        $this->globals = $globals;
    }

    public function send()
    {
        $email = (new Email())
            ->from($this->globals->getAppEmail())
            ->to('nvauche@gmail.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');

        try {
            $this->mailer->send($email);
        } catch (\Exception $e) {
            var_dump($e);
            exit;
        }
    }
}