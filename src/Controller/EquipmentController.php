<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Form;

use App\Entity\Equipment;
use App\Form\EquipmentAddType;

class EquipmentController extends AbstractController
{
    /**
     * @Route("/ajouter-un-equipement", name="equipment.add")
     */

    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $equipment = new Equipment();

        $form = $this->createForm(EquipmentAddType::class, $equipment);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipment);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('equipment');
        }
        

        return $this->render('character/equipment-add.html.twig', [
            'formEquipment' => $form->createView()
        ]);
    }
}
