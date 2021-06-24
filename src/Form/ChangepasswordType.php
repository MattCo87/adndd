<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class ChangepasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $user = new User();
                    
        $builder
            ->add('password', PasswordType::class, array(
                'mapped' => false,
                'label' => 'Ancien mot de passe: ',
            ))

            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'mapped' => false,
                'invalid_message' => 'Les deux mots de passe doivent être identiques',
                'options' => ['attr' => ['class' => 'password-field']],
                'required' => true,
                'first_options'  => ['label' => 'Nouveau mot de passe: '],
                'second_options' => ['label' => 'Confirmer mot de passe: '],
            ))

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
