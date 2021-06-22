<?php

namespace App\Controller;
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
}
