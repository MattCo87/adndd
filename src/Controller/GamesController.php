<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GamesController extends AbstractController
{
    /**
     * @Route("/les-jeux", name="games")
     */
    public function index(): Response
    {
        return $this->render('games/index.html.twig');
    }

    /**
     * @Route("/ajouter-un-jeu", name="games.add")
     */
    public function add(): Response
    {
        return $this->render('games/add.html.twig');
    }

    /**
     * @Route("/ajouter-un-jeu-de-des", name="games.adddiceset")
     */
    public function addDiceset(): Response
    {
        return $this->render('games/adddiceset.html.twig');
    }
}
