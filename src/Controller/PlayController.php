<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\PlayType;

class PlayController extends AbstractController
{
    /**
     * @Route("/jouer", name="play")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', 'noshadow');

        $form = $this->createForm(PlayType::class);

        return $this->render('play/index.html.twig', [
            'playform' => $form->createView(),
        ]);
    }

    /**
     * @Route("/table", name="table")
     */
    public function table(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'transparent');
        $session->set('mainMode', 'noshadow wide tableView');

        return $this->render('play/table.html.twig');
    }

    /**
     * @Route("/jitsi", name="jitsi")
     */
    public function jitsi(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'transparent');
        $session->set('mainMode', 'noshadow wide tableView');
  
        return $this->render('play/jitsi.html.twig');
    }
}
