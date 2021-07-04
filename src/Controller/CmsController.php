<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Doctrine\ORM\Query\AST\LikeExpression;

use App\Entity\CMS;

class CmsController extends AbstractController
{
    /**
     * @Route("/mentions-legales", name="legal.mentions")
     */
    public function legalMentions(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

        $legalMentions = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'mentions legales']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalMentions,
        ]);
    }

    /**
     * @Route("/politique-de-confidentialite", name="legal.privacy")
     */
    public function legalPrivacy(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

        $legalPrivacy = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'politique de confidentialite']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalPrivacy,
        ]);
    }

    /**
     * @Route("/conditions-d-utilisation", name="legal.tou")
     */
    public function legalTou(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

        $legalTou = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['title' => 'conditions d\'utilisation']);

        return $this->render('legal_pages/index.html.twig', [
            'content' => $legalTou,
        ]);
    }

    /**
     * @Route("/gestion-du-contenu", name="cms.links")
     */
    public function cmsLinks(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        return $this->render('cms/cms.html.twig');
    }
}
