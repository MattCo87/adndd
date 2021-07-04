<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Form;

use App\Entity\Spell;
use App\Form\SpellAddType;

class SpellController extends AbstractController
{
    /**
    * @Route("/ajouter-un-sort", name="spell.add")
    */

    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $spell = new Spell();

        $form = $this->createForm(SpellAddType::class, $spell);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($spell);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('spell.add');
        }

        return $this->render('character/spell-add.html.twig', [
            'formSpell' => $form->createView()
        ]);
    }

}
