<?php

namespace App\Form;

use App\Entity\CharacterSkill;
use App\Entity\Character;
use App\Entity\Skill;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class CharacterSkillType extends AbstractType
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


            ->add('idSkill', EntityType::class, [
                'class' => Skill::class,
                'choice_label' => function ($skill) {
                    return $skill->getName();
                    },    
                'choice_value' => function (?Skill $entity) {
                    return $entity ? $entity->getId() : '';
                },           
                'label' => 'Compétence',       
            ])


            ->add('valeur')
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CharacterSkill::class,
        ]);
    }
}
