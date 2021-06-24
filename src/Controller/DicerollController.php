<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Diceset;
use App\Entity\Dice;

class DicerollController extends AbstractController
{
    /**
     * @Route("/lancer-de-des", name="diceroll")
     */
    public function index(): Response
    {
        $em = $this->getDoctrine()->getRepository(Diceset::class)->find(1);
        $dices = $em->getDices();
        return $this->render('diceroll/index.html.twig',[
         'dices'=> $dices,   
        ]);
    }
}
