<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use App\Form\AccountType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ChangepasswordType;
use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class ChangepasswordController extends AbstractController
{
    /**
     * @Route("/changepassword", name="changepassword")
    */

    public function index(Request $request, UserPasswordEncoderInterface $encoder): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user = $this->getUser();

        $form = $this->createForm(ChangepasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $plainPassword = $request->request->get('changepassword')['plainPassword']['second'];
            $encoded = $encoder->encodePassword($user, $plainPassword);

            $user->setPassword($encoded);

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

            return $this->redirectToRoute('app_logout');
        }

        return $this->render('account/changepassword.html.twig', [
            'formChangepassword' => $form->createView()
        ]);
    }
}