<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomepageController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(): Response
    {
<<<<<<< HEAD
        //      return $this->render('homepage/edit.html.twig');
        //     return $this->render('homepage/index.html.twig');
        return $this->render('games/games.html.twig');
        //     return $this->render('games/edit.html.twig');
=======
        return $this->render('homepage/index.html.twig');
>>>>>>> develop
    }
}
