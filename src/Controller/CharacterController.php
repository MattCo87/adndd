<?php

namespace App\Controller;

use App\Form\CharacterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/creer-personnage", name="character")
     */
    public function index(): Response
    {

        $form = $this->createForm(CharacterType::class);

        return $this->render(
            'character/index.html.twig',
            [
                'characterform' => $form->createView(),
            ]
        );
    }

    /**
     * @Route("/feuille-personnage-edit", name="characteredit")
     */
    public function edit(): Response
    {
        return $this->render(
            'character/edit.html.twig'
        );
    }
}
