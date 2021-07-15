<?php

namespace App\Form;

use App\Entity\Character;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class SheetProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('avatar', FileType::class, [
                'label' => 'Avatar',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => false,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '1024k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                        ],
                        'mimeTypesMessage' => 'Merci d\'uploader un fichier image valide',
                    ])
                ]
            ])
            ->add('name', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('gender', TextType::class, [
                'label' => 'Sexe'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Allure, attitude'
            ])
            ->add('age', IntegerType::class, [
                'label' => 'Âge',
                'scale' => 2,
                'attr' => array(
                    'step' => 1,
                    'min' => 1,
                ),
            ])
            ->add('birthplace', TextType::class, [
                'label' => 'Lieu de naissance'
            ])
            ->add('force', TextType::class, [
                'label' => 'FOR',
                'mapped' => false,
            ])
            ->add('concentration', TextType::class, [
                'label' => 'CON',
                'mapped' => false,
            ])
            ->add('taille', TextType::class, [
                'label' => 'TAI',
                'mapped' => false,
            ])
            ->add('intelligence', TextType::class, [
                'label' => 'INT',
                'mapped' => false,
            ])
            ->add('pouvoir', TextType::class, [
                'label' => 'POU',
                'mapped' => false,
            ])
            ->add('dexterite', TextType::class, [
                'label' => 'DEX',
                'mapped' => false,
            ])
            ->add('apparence', TextType::class, [
                'label' => 'APP',
                'mapped' => false,
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Créer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Character::class,
        ]);
    }
}
