<?php

namespace App\Form;

use App\Entity\Equipment;
use App\Entity\Skill;
use App\Entity\SkillEquipment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Repository\EquipmentRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EquipmentSkillType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name', EntityType::class, [
                'class' => Equipment::class,
                'choice_label' => function ($equipment) {
                    return $equipment->getName();
                    },    
                'choice_value' => function (?Equipment $entity) {
                    return $entity ? $entity->getId() : '';
                },           
                'label' => 'Equipment',       
            ])

            ->add('skills', EntityType::class, [
                'class' => Skill::class,
                'multiple' => true,
                'expanded' => true,
                'label' => 'Skill',          
            ])            
        
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Equipment::class,
        ]);
    }
}
