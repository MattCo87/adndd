<?php

namespace App\Controller;

use App\Entity\Character;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

use App\Form\SheetProfileType;

class SheetController extends AbstractController
{
    /**
     * @Route("/fiche-personnage", name="sheet")
     */
    public function index(Request $request): Response
    {
        $character = new Character();
        $form = $this->createForm(SheetProfileType::class, $character);
        $form->handleRequest($request);


       if ($form->isSubmitted() && $form->isValid()) {
           $entityManager = $this->getDoctrine()->getManager();


            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('avatar')->getData();

            // this condition is needed because the 'image' field is not required
            // so the JPG file must be processed only when a file is uploaded
            if ($imageFile) {
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $imageFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $imageFile->move(
                        $this->getParameter('avatars_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the JPG file name
                // instead of its contents
                $character->setAvatar($newFilename);
            }

            // Try to get characts
           dd($request->request->getData());


            // ... persist the $game variable or any other work
            $entityManager->persist($character);
            $entityManager->flush();

        }


        return $this->render('character/sheet.html.twig', [
            'sheetprofileform' => $form->createView(),
        ]);
    }
}
