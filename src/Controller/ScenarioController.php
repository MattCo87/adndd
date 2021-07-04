<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use App\Form\ScenarioFormType;

class ScenarioController extends AbstractController
{
    /**
     * @Route("/creer-table", name="scenario")
     */
    public function index(Request $request): Response
    {
        $session = $request->getSession();
        $session->set('headerMode', 'edit');
        $session->set('mainMode', 'noshadow');

        $form = $this->createForm(ScenarioFormType::class);

      return $this->render('scenario/index.html.twig', [
            'scenarioform' => $form->createView(),
        ]);  
    }
}
