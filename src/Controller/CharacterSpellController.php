<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\CharacterSpell;
use App\Form\CharacterSpellType;

class CharacterSpellController extends AbstractController
{
    /**
     * @Route("/ajouter-sort-personnage", name="spell-character.add")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

       $characterspell = new CharacterSpell();

        $form = $this->createForm(CharacterSpellType::class, $characterspell);

        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($characterspell);
            $entityManager->flush();

            /*
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
            */
            $this->addFlash('success', 'Vos informations ont été enregistrées !');  

            return $this->redirectToRoute('spell-character.add');
        }

        return $this->render('character_spell/index.html.twig', [
            'EquipmentSpell' => $form->createView()
        ]);
    }
}
