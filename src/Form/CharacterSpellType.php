<?php

namespace App\Form;

use App\Entity\CharacterSpell;
use App\Entity\Character;
use App\Entity\Spell;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CharacterSpellType extends AbstractType
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


            ->add('idSpell', EntityType::class, [
                'class' => Spell::class,
                'choice_label' => function ($spell) {
                    return $spell->getName();
                    },    
                'choice_value' => function (?Spell $entity) {
                    return $entity ? $entity->getId() : '';
                },           
                'label' => 'Sortilège',       
            ])


            ->add('level')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CharacterSpell::class,
        ]);
    }
}
