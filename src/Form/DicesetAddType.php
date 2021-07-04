<?php

namespace App\Form;

use App\Entity\Dice;
use App\Entity\Diceset;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DicesetAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom du jeu de dés'
            ])
            ->add('dices', EntityType::class, [
                'class' => Dice::class,
                'choice_label' => function ($dice) {
                    return $dice->getName();
                    },
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Diceset::class,
        ]);
    }
}
