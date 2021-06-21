<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;


class AccountType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName',
            TextType::class,
            [
                'label' => 'Votre nom',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'ex:  Dupont',
                    ],
            ])
            ->add('lastName',
            TextType::class,
            [
                'label' => 'Votre prénom',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'ex: Sophie ',
                    ],
            ])
            ->add('idRegister',
            TextType::class,
            [
                'label' => 'N° Adhérent',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => '',
                    ],
            ])
            ->add('pseudo',
            TextType::class,
            [
                'label' => 'Votre pseudonyme',
                'required' => true,
                'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => '',
                    ],
            ])            
            ->add('email',
                EmailType::class,
                [
                    'label' => 'Votre e-mail',
                    'required' => true,
                    'attr' =>
                        [
                            'class' => 'form-control',
                            'placeholder' => 'ex: sophie@dupont.com',
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
            'data_class' => User::class,
        ]);
    }
}
