<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use App\Form\AccountType;
use App\Entity\User;


class AccountController extends AbstractController
{
    /**
     * @Route("/account", name="account")
     */
    public function index(Request $request): Response
    {
        $user = new User();

        $form = $this->createForm(AccountType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            
        }

        return $this->render('account/index.html.twig', [
            'formUser' => $form->createView()
        ]);
    }
}
