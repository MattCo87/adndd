<?php

namespace App\Form;

use App\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class CharacterType extends AbstractType
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
                        'Advanced Donjons & Dragons v2' => 'adnd2',
                        'Chroniques Oubliées' => 'cob',
                        'Vampire La Mascarade' => 'vamp',
                        'L\'Appel de Cthulhu' => 'cth',
                    ]
                ]
            )

            ->add(
                'sheet_type',
                ChoiceType::class,
                [
                    'label' => 'Type de fiche',
                    'choices' => [
                        'prétirée' => 'premade',
                        'personnalisée' => 'custom',
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

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
