<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\CharacterType;

class CharacterController extends AbstractController
{
    /**
     * @Route("/creer-personnage", name="character.create")
     */
    public function create(Request $request): Response
    {

        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $form = $this->createForm(CharacterType::class);
        $form->handleRequest($request);

        if ($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));
    
            if ($form->isSubmitted() && $form->isValid()) {
                // perform some action...
    
                return $this->redirectToRoute('characteredit');
            }
        }

        return $this->render(
            'character/create.html.twig', [
                'characterForm' => $form->createView(),
        ]);
    }

    /**
     * @Route("/feuille-personnage-edit", name="characteredit")
     */
    public function edit(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

       return $this->render(
            'character/edit.html.twig'
        );
    }
}
