<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Characteristic;
use App\Entity\CharacterCharacteristic;
use App\Form\CharacteristicType;
use App\Form\CharacterCharacteristicType;

class CharacteristicController extends AbstractController
{
    /**
     * @Route("/ajouter-caracteristique", name="charasteristic.add")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $characteristic = new Characteristic();

        $form = $this->createForm(CharacteristicType::class, $characteristic);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($characteristic);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('charasteristic.add');
        }

        return $this->render('charasteristic/index.html.twig', [
            'formCharacteristic' => $form->createView()
        ]);
    }

    /**
     * @Route("/ajouter-caracteristique-personnage", name="characteristic-character.add")
     */
    public function addCharacterCharacteristic(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $charactercharacteristic = new CharacterCharacteristic();

        $form = $this->createForm(CharacterCharacteristicType::class, $charactercharacteristic);  
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($charactercharacteristic);
            $entityManager->flush();
            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('characteristic-character.add');
        }

        return $this->render('charasteristic/characteristic_character.html.twig', [
            'formCharacteristicCharacter' => $form->createView()
        ]);
    }
}
