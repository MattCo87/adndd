<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ContactType;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */

    public function index(Request $request, MailerService $mailer): Response
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mailer->send($form->getData(), 'user');
            $mailer->send($form->getData(), 'admin');

            $this->addFlash('success', 'Votre message a été envoyé ! Vous allez même recevoir une confirmation !');
        }

        return $this->render('contact/index.html.twig', [
            'contactform' => $form->createView(),
        ]);
    }
}
