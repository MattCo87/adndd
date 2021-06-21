<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailerService;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
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
     * @Route("/jitsi")
     */
    public function jitsi(): Response
    {
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://meet.jit.si/libs/lib-jitsi-meet.min.js"></script>
	JitsiMeetJS.init();
        return $this->render('test/index.html.twig');
    }
}
