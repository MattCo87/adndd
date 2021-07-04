<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SheetController extends AbstractController
{
    /**
     * @Route("/fiche-personnage", name="sheet")
     */
    public function index(): Response
    {
        return $this->render('character/sheet.html.twig');
    }
}
