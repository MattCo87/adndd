<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use App\Form\ChangepasswordType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use App\Entity\User;


class ChangepasswordController extends AbstractController
{
    /**
     * @Route("/changepassword", name="changepassword"
     */

    public function index(Request $request): Response
    {
        $user = $this->getUser();

        $form = $this->createForm(ChangepasswordType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
/*            $entityManager = $this->getDoctrine()->getManager();

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

            return $this->redirectToRoute('account');
        }

        return $this->render('account/changepassword.html.twig', [
            'formChangepassword' => $form->createView()
        ]);
*/      


            $passwordEncoder = $this->get('security.password_encoder');
            $oldPassword = $request->request->get('')['oldPassword'];
            // Si l'ancien mot de passe est bon
            if ($passwordEncoder->isPasswordValid($user, $oldPassword))
            {
                $newEncodedPassword = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
var_dump($request->request);die();
                $user->setPassword($newEncodedPassword);

                $em->persist($user);
                $em->flush();

                $this->addFlash('notice', 'Votre mot de passe à bien été changé !');

                return $this->redirectToRoute('account');
            } else {
                $form->addError(new FormError('Ancien mot de passe incorrect'));
            }



        }
    }
}