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

            ->add('idSpecialty', ChoiceType::class, [
                    'choices'  => [
                        'Maybe' => null,
                        'Yes' => true,
                        'No' => false,
                    ],
                ])

            ->add('idEquipmenttype', ChoiceType::class, [
                    'choices'  => [
                        'Maybe' => null,
                        'Yes' => true,
                        'No' => false,
                    ],
                ])
 
            ->add('save', SubmitType::class,
            [
                'label' => 'Envoyez !',
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
