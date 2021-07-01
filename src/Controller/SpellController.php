<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Spell;

use Symfony\Component\Form\Forms;
use App\Form\UpdateSpellType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;

class SpellController extends AbstractController
{
    /**
     * @Route("/spell", name="spell")
     */
    public function index2(): Response
    {
        return $this->render('spell/index.html.twig', [
            'controller_name' => 'SpellController',
        ]);
    }

    /**
    * @Route("/changespell", name="changespell")
    */
    public function index(Request $request): Response
    {
        $spell = new Spell();

        $form = $this->createForm(UpdateSpellType::class, $spell);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spell);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('spell');
        }

        return $this->render('character/Updatespell.html.twig', [
            'formSpell' => $form->createView()
        ]);
    }

}
