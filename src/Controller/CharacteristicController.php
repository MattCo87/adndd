<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Characteristic;
use App\Form\CharacteristicType;
use App\Form\CharacterCharacteristicType;
use App\Entity\CharacterCharacteristic;

use Symfony\Component\HttpFoundation\Request;

class CharacteristicController extends AbstractController
{
    /**
     * @Route("/ajouter-caracteristique", name="addcharasteristic")
     */
    public function index(Request $request): Response
    {

        $characteristic = new Characteristic();


        $form = $this->createForm(CharacteristicType::class, $characteristic);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($characteristic);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('addcharasteristic');
        }

        return $this->render('charasteristic/index.html.twig', [
            'formCharacteristic' => $form->createView()
        ]);
    }

    /**
     * @Route("/ajouter-caracteristique-personnage", name="addcharactercharasteristic")
     */
    public function addCharacterCharacteristic(Request $request): Response
    {

        $charactercharacteristic = new CharacterCharacteristic();


        $form = $this->createForm(CharacterCharacteristicType::class, $charactercharacteristic);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($charactercharacteristic);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('addcharactercharasteristic');
        }

        return $this->render('charasteristic/addCharacteristicCharacter.html.twig', [
            'formCharacteristicCharacter' => $form->createView()
        ]);
    }
}
