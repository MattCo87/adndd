<?php

namespace App\Form;

use App\Entity\Spell;
use App\Entity\SpellType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class UpdateSpellType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('effect', TextareaType::class, [
                'label' => 'Effet',
            ])
            ->add('reach')
            ->add('zone')
            ->add('idSpelltype', EntityType::class, [
                'class' => Spelltype::class,
                'choice_label' => 'name',
            ])
 
            ->add('save', SubmitType::class,
            [
                'label' => 'Enregistrer',
                'attr' =>
                    [
                        'class' => 'form-sumbit',
                    ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Spell::class,
        ]);
    }
}
