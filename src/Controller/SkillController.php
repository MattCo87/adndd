<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Form;

use App\Entity\Equipment;
use App\Entity\Skill;
use App\Form\SkillAddType;
use App\Form\SkillEquipmentType;

class SkillController extends AbstractController
{
    /**
     * @Route("/ajouter-une-competence", name="skill.add")
     */
    
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $skill = new Skill();
        $equipment = new Equipment();

        $form = $this->createForm(SkillAddType::class, $skill);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('skill.add');
        }        

        return $this->render('character/skill-add.html.twig', [
            'formSkill' => $form->createView(),
        ]);
    }
}
