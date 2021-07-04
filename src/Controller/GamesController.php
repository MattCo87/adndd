<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use App\Entity\Dice;
use App\Entity\Diceset;
use App\Entity\Game;
use App\Entity\Gamerules;

use App\Form\DicesetAddType;
use App\Form\GameAddType;
use App\Form\GamerulesAddType;

class GamesController extends AbstractController
{
    /**
     * @Route("/les-jeux", name="games")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', '');
        $session->set('mainMode', '');

        return $this->render('games/index.html.twig');
    }

    /**
     * @Route("/ajouter-un-jeu", name="games.add")
     */
    public function add(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $game = new Game();
        $form = $this->createForm(GameAddType::class, $game);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();


            /** @var UploadedFile $imageFile */
            $imageFile = $form->get('image')->getData();

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
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'imageFilename' property to store the JPG file name
                // instead of its contents
                $game->setImage($newFilename);
            }

            /** @var UploadedFile $gamerulesFile */
            $gamerulesFile = $form->get('gamerules')->getData();

            // this condition is needed because the 'gamerules' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($gamerulesFile) {
                $originalFilename = pathinfo($gamerulesFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $gamerulesFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $gamerulesFile->move(
                        $this->getParameter('gamerules_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'gamerulesFilename' property to store the PDF file name
                // instead of its contents
                $newgamerules = new Gamerules();
                $newgamerules->setName($newFilename);
                $newgamerules->setPath($newFilename);
                $game->addGamerule($newgamerules);
            }



            // ... persist the $game variable or any other work
            $entityManager->persist($game);
            $entityManager->flush();

            return $this->redirectToRoute('games.add');
        }


        return $this->render('games/add.html.twig', [
            'addGameForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/ajouter-une-regle-de-jeu", name="games.addgamerules")
     */
    public function addGamerules(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $gamerules = new Gamerules();
        $form = $this->createForm(GamerulesAddType::class, $gamerules);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();

            /** @var UploadedFile $gamerulesFile */
            $gamerulesFile = $form->get('path')->getData();

            // this condition is needed because the 'gamerules' field is not required
            // so the PDF file must be processed only when a file is uploaded
            if ($gamerulesFile) {
                $originalFilename = pathinfo($gamerulesFile->getClientOriginalName(), PATHINFO_FILENAME);
                // this is needed to safely include the file name as part of the URL
                $safeFilename = transliterator_transliterate('Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $gamerulesFile->guessExtension();

                // Move the file to the directory where images are stored
                try {
                    $gamerulesFile->move(
                        $this->getParameter('gamerules_directory'),
                        $newFilename
                    );
                } catch (FileException $e) {
                    // ... handle exception if something happens during file upload
                }

                // updates the 'gamerulesFilename' property to store the PDF file name
                // instead of its contents
                $gamerules->setPath($newFilename);
            }



            // ... persist the $game variable or any other work

            $entityManager->persist($gamerules);
            $entityManager->flush();

            return $this->redirectToRoute('games.addgamerules');
        }

        return $this->render('games/addgamerules.html.twig', [
            'addGameRulesForm' => $form->createView()
        ]);
    }


    /**
     * @Route("/ajouter-un-jeu-de-des", name="games.adddiceset")
     */
    public function addDiceset(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $diceset = new Diceset();
        $form = $this->createForm(DicesetAddType::class, $diceset);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $arDices = $request->request->get('add_diceset')['dices'];

            foreach ($arDices as $key => $diceId) {
                $dice = $this->getDoctrine()->getRepository(Dice::class)->find($diceId);
                $dice->addDiceset($diceset);
                $entityManager->persist($diceset);
            }

            $entityManager->flush();

            return $this->redirectToRoute('games.adddiceset');
        }

        return $this->render('games/adddiceset.html.twig', [
            'addDicesetForm' => $form->createView()
        ]);
    }
}
