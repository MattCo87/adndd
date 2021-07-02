<?php

namespace App\Form;

use App\Entity\CharacterCharacteristic;
use App\Entity\Character;
use App\Entity\Characteristic;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class CharacterCharacteristicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idCharacter', EntityType::class, [
                'class' => Character::class,
                'choice_label' => function ($character) {
                    return $character->getName();
                    },    
                'choice_value' => function (?Character $entity) {
                    return $entity ? $entity->getId() : '';
                },           
                'label' => 'Personnage',       
            ])


            ->add('idCharacteristic', EntityType::class, [
                'class' => Characteristic::class,
                'choice_label' => function ($characteristic) {
                    return $characteristic->getName();
                    },    
                'choice_value' => function (?Characteristic $entity) {
                    return $entity ? $entity->getId() : '';
                },           
                'label' => 'Caractéristique',       
            ])
            ->add('valeur')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CharacterCharacteristic::class,
        ]);
    }
}
