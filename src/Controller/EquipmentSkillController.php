<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipment;
use App\Entity\Skill;
use App\Form\EquipmentSkillType;
use Symfony\Component\HttpFoundation\Request;

class EquipmentSkillController extends AbstractController
{
    /**
     * @Route("addskill", name="addskill")
     */
    public function index(Request $request): Response
    {
        
        $equipment = new Equipment();

        $form = $this->createForm(EquipmentSkillType::class, $equipment);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $equipmentid = $request->request->get('equipment_skill')['name'];
            $equipment = $this->getDoctrine()->getRepository(Equipment::class)->find($equipmentid);

            $skills = $request->request->get('equipment_skill')['skills'];
            $entityManager = $this->getDoctrine()->getManager();

            foreach( $skills as $key => $skillId ){
                $skill = $this->getDoctrine()->getRepository(Skill::class)->find($skillId);
                $equipment->addSkill($skill);
                $entityManager->persist($equipment);
            }

            $entityManager->flush();
            
            $this->addFlash('success', 'Vos informations ont été enregistrées !');  

            return $this->redirectToRoute('addskill');
        }

        return $this->render('equipment_skill/index.html.twig', [
            'EquipmentSkill' => $form->createView()
        ]); 
    }

    /**
     * @Route("upskill", name="upskill")
     */

    public function modifierEquipment(Request $request): Response
    {
        $equipment = new Equipment();

        $form = $this->createForm(EquipmentSkillType::class, $equipment);
        //dd($request->request);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            // On récupère l'EntityManager
            $em = $this->getDoctrine()
            ->getManager();

            // On récupère l'entité correspondant à l'id $id
            $equipment = $em->getRepository('Equipment')
            ->find($id);

            if ($equipment === null) {
            throw $this->createNotFoundException('equipment[id='.$id.'] inexistant.');
            }

            // On récupère toutes les catégories :
            $liste_categories = $em->getRepository('Skill')
            ->findAll();

            // On boucle sur les catégories pour les lier à l'article
            foreach($liste_categories as $categorie)
            {
            $equipment->addCategorie($categorie);
            }

            // Inutile de persister l'article, on l'a récupéré avec Doctrine

            // Étape 2 : On déclenche l'enregistrement
            $em->flush();

            return $this->redirectToRoute('addskill');
        }

        return $this->render('equipment_skill/index.html.twig', [
            'EquipmentSkill' => $form->createView()
        ]);
    }

}
