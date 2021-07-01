<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\CharacterSkill;
use App\Form\CharacterSkillType;
use Symfony\Component\HttpFoundation\Request;

class CharacterSkillController extends AbstractController
{
    /**
     * @Route("/ajouter-competence-personnage", name="addcharacterskill")
     */
    public function index(Request $request): Response
    {   
        $characterskill = new CharacterSkill();

        $form = $this->createForm(CharacterSkillType::class, $characterskill);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($characterskill);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');  

            return $this->redirectToRoute('addcharacterskill');
        }


        return $this->render('character_skill/index.html.twig', [
            'CharacterSkill' => $form->createView(),
        ]);
    }
}
