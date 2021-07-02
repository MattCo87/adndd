<?php

namespace App\Form;

use App\Entity\Game;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;

class PlayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => function ($game) {
                    return $game->getName();
                },
                'label' => 'Sélectionner un jeu',
            ])

           ->add(
                'statuswait',
                CheckboxType::class,
                [
                    'label'    => 'En attente de joueurs',
                    'required' => false,
                ]
            )
            ->add(
                'statusrunning',
                CheckboxType::class,
                [
                    'label'    => 'En cours',
                    'required' => false,
                ]
            )
            ->add(
                'statusclosed',
                CheckboxType::class,
                [
                    'label'    => 'Parties terminées',
                    'required' => false,
                ]
            );
    }

    /*   public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Scenario::class,
        ]);
    } */
}
