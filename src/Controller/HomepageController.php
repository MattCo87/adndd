<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\MailerService;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', '');

        return $this->render('homepage/index.html.twig');
    }

    /**
     * @Route("/mailtest")
     */
    public function mail(MailerService $mailerService): Response
    {
        $mailerService->send();
        return $this->render('homepage/index.html.twig');
    }

    /**
     * @Route("/editer-page-accueil", name="homepage.edit")
     */
    public function edit(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', '');

        return $this->render('homepage/edit.html.twig');
    }
}
