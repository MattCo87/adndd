<?php

namespace App\Form;

use App\Entity\Character;
use App\Entity\Game;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CharacterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => function ($game) {
                    return $game->getName();
                    },
                'label' => 'Jeu',                   
                ]
            )

            ->add('sheet_type', ChoiceType::class, [
                    'label' => 'Type de fiche',
                    'choices' => [
                        'prétirée' => 'premade',
                        'personnalisée' => 'custom',
                    ],
                    'attr' =>
                    [
                        'class' => 'form-control',
                    ],
                    'expanded' => true,
                    'data' => 'premade',
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
