<?php

namespace App\Controller;

use App\Form\PlayType;
use App\Entity\Scenario;
use App\Form\ScenarioFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/creer-table", name="scenario")
     */
    public function index(): Response
    {
        $form = $this->createForm(ScenarioFormType::class);

        return $this->render('scenario/index.html.twig', [
            'scenarioform' => $form->createView(),
        ]);
    }

    /**
     * @Route("/jouer", name="play")
     */
    public function jouer(): Response
    {
        $currentdate = new \DateTime('now');
        $form = $this->createForm(PlayType::class);
        /*$scenarios = $this->getDoctrine()->getRepository(Scenario::class)->findBy(
            [ 'private' => false],
            ['start_at' => 'ASC']
        );*/
        $scenarios = $this->getDoctrine()->getRepository(Scenario::class)->find($currentdate);
        return $this->render('play/index.html.twig', [
            'playform' => $form->createView(),
            'scenarios' => $scenarios,
        ]);
    }

    /**
     * @Route("/table-de-jeu", name="game_table")
     */
    public function gameTable(int $table_id=1): Response
    {
        $scenario = $this->getDoctrine()->getRepository(Scenario::class)->find($table_id);
        $user = $this->getUser();
        return $this->render('game_table/index.html.twig', [
            'scenario' => $scenario,
            'user' => $user,
        ]);
    }
}
