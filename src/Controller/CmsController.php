<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\CMS;

class CmsController extends AbstractController
{
    /**
     * @Route("/mentions-legales", name="legal.mentions")
     */
    public function legalMentions(): Response
    {
        $legalMentions = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'mentions legales']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalMentions,
        ]);
    }

    /**
     * @Route("/politique-de-confidentialite", name="legal.privacy")
     */
    public function legalPrivacy(): Response
    {
        $legalPrivacy = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'politique de confidentialite']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalPrivacy,
        ]);
    }

    /**
     * @Route("/conditions-d-utilisation", name="legal.tou")
     */
    public function legalTou(): Response
    {
        $legalTou = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'conditions d utilisation']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalTou,
        ]);
    }
}