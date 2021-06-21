<?php

namespace App\Form;

use App\Entity\Scenario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PlayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'game',
                ChoiceType::class,
                [
                    'label' => 'Jeu',
                    'choices' => [
                        'Tous les jeux' => 'all',
                        'Advanced Donjons & Dragons v2' => 'adnd2',
                        'Chroniques Oubliées' => 'cob',
                        'Vampire La Mascarade' => 'vamp',
                        'L\'Appel de Cthulhu' => 'cth',
                    ]
                ]
            )
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
