<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\FAQ;

class FaqController extends AbstractController
{
    /**
     * @Route("/faq", name="faq")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

        $arFaq = $this->getDoctrine()->getRepository(FAQ::class)->findBy([], ['number' => 'asc']);

        return $this->render('faq/index.html.twig', [
            'controller_name' => 'FAQController',
            'arFaq' => $arFaq,
        ]);
    }
}
