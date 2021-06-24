<?php

namespace App\Form;

use App\Entity\Equipment;
use App\Entity\Specialty;
use App\Entity\Equipmenttype;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;


class UpdateEquipmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('base')
            ->add('damage')
            ->add('hands')
            ->add('health')
            ->add('ranged')
            ->add('armorPoints')
            ->add('skillModifyer')

            ->add('idSpecialty', EntityType::class, [
                'class' => Specialty::class,
                'choice_label' => 'name',
                'label' => 'Specialty',
            ])

            ->add('idEquipmenttype', EntityType::class, [
                'class' => Equipmenttype::class,
                'choice_label' => 'name',
                'label' => 'Type equipment',
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
            'data_class' => Equipment::class,
        ]);
    }
}
