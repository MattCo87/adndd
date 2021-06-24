<?php

namespace App\Controller;

use App\Form\PlayType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlayController extends AbstractController
{
    /**
     * @Route("/jouer", name="play")
     */
    public function index(): Response
    {
        $form = $this->createForm(PlayType::class);

        return $this->render('play/index.html.twig', [
            'playform' => $form->createView(),
        ]);
    }
}
