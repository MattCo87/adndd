<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use App\Form\AccountType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    
    public function index(Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(AccountType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vos informations ont été enregistrées !');

            return $this->redirectToRoute('account');
        }

        return $this->render('account/index.html.twig', [
            'formUser' => $form->createView()
        ]);
    }
}
