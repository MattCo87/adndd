<?php

namespace App\Form;

use App\Entity\Scenario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
                        'placeholder' => 'ex: Elrik',
                    ],
                ]
            )
            ->add(
                'game',
                ChoiceType::class,
                [
                    'label' => 'Jeu',
                    'choices' => [
                        'Advanced Donjons & Dragons v2' => 'adnd2',
                        'Chroniques Oubliées' => 'cob',
                        'Vampire La Mascarade' => 'vamp',
                        'L\'Appel de Cthulhu' => 'cth',
                    ]
                ]
            )
            ->add('start_at', DateType::class, [
                'label' => 'Première session',
                'widget' => 'choice',
            ])
            ->add(
                'seats',
                RangeType::class,
                [
                    'label' => 'Places',
                    'attr' => [
                        'min' => 3,
                        'max' => 5
                    ]
                ],
            )
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
            );
    }
}
