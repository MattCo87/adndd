<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipment;
use App\Entity\Skill;
use App\Form\SkillType;
use App\Form\SkillEquipmentType;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class SkillController extends AbstractController
{
    /**
     * @Route("/changeskill", name="changeskill")
     */
    
    public function index(Request $request): Response
    {
        $skill = new Skill();
        $equipment = new Equipment();

        $form = $this->createForm(SkillType::class, $skill);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($skill);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('changeskill');
        }
        

        return $this->render('character/Updateskill.html.twig', [
            'formSkill' => $form->createView(),
        ]);
    }
}
