<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Service\MailerService;
use App\Entity\CMS;

class AssociationController extends AbstractController
{
     /**
     * @Route("/association", name="association")
     */
    public function association(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

       $association = $this->getDoctrine()->getRepository(CMS::class)->findOneBy(['type' => 'about']);

        return $this->render('association/index.html.twig', [
            'association' => $association,
        ]);
    }

}
