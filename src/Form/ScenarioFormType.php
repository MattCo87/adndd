<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ScenarioFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Nom de la table',
                    'required' => true,
                    'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'ex: Elric',
                    ],
                ]
            )
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => function ($game) {
                    return $game->getName();
                },
                'label' => 'Sélectionner un jeu',
            ])

            ->add('start_at', DateType::class, [
                'label' => 'Première session',
                'widget' => 'single_text'
            ])
            ->add(
                'private',
                ChoiceType::class,
                [
                    'label' => 'Visibilité',
                    'choices' => [
                        'privée' => 'pvt',
                        'publique' => 'pub',
                    ],
                    'attr' =>
                    [
                        'class' => 'form-control',
                    ],
                    'expanded' => true
                ]
            )
            ->add('submit', SubmitType::class);
    }
}
