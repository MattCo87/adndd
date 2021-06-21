<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name',
            TextType::class,
            [
                'label' => 'Votre nom',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'ex: Sophie Dupont',
                    ],
            ])

            ->add('email',
            TextType::class,
            [
                'label' => 'Votre e-mail',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'adndd@gmail.com',
                    ],
            ])

            ->add('subject',
            TextType::class,
            [
                'label' => 'Sujet',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'Être adhérent',
                    ],
            ])

            ->add('message',
            TextareaType::class,
            [
                'label' => 'Votre message',
                'required' => true,
                'attr' =>
                [
                    'class' => 'form-control',
                    'placeholder' => 'Description de votre demande',
                ],
        ])

            ->add('submit', SubmitType::class,
            [
                'label' => 'Envoyez !',
                'attr' =>
                [
                    'class' => 'form-sumbit',
                ],
        ]);
    ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
