<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\ContactType;
use App\Service\MailerService;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="contact")
     */

    public function index(Request $request, MailerService $mailer): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

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
