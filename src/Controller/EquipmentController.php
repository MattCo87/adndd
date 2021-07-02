<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Equipment;
use Symfony\Component\Form\Forms;
use App\Form\UpdateEquipmentType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


class EquipmentController extends AbstractController
{
    /**
     * @Route("/equipment", name="equipment")
     */
    public function index2(): Response
    {
        return $this->render('character/index.html.twig', [
            'controller_name' => 'EquipmentController',
        ]);
    }

    /**
     * @Route("/changeequipment", name="changeequipment")
     */

    public function index(Request $request): Response
    {
        $equipment = new Equipment();

        $form = $this->createForm(UpdateEquipmentType::class, $equipment);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($equipment);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('equipment');
        }

        return $this->render('character/Updateequipment.html.twig', [
            'formEquipment' => $form->createView()
        ]);
    }
}
