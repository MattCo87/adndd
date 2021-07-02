<?php

namespace App\Form;

use App\Entity\Game;
use App\Entity\Gamerules;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class AddGamerulesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('game', EntityType::class, [
                'class' => Game::class,
                'choice_label' => function ($game) {
                    return $game->getName();
                },
                'label' => 'Sélectionner un jeu',
            ])

            ->add(
                'name',
                TextType::class,
                [
                    'label' => 'Nom des règles',
                    'required' => true,
                    'attr' =>
                    [
                        'class' => 'form-control',
                        'placeholder' => 'ex: Livre de base',
                    ],
                ]
            )

            ->add('path', FileType::class, [
                'label' => 'Fichier PDF',

                // unmapped means that this field is not associated to any entity property
                'mapped' => false,

                // make it optional so you don't have to re-upload the PDF file
                // every time you edit the Product details
                'required' => true,

                // unmapped fields can't define their validation using annotations
                // in the associated entity, so you can use the PHP constraint classes
                'constraints' => [
                    new File([
                        'maxSize' => '100M',
                        'mimeTypes' => [
                            'application/pdf',
                            'application/x-pdf',
                        ],
                        'mimeTypesMessage' => 'Merci d\'uploader un fichier PDF valide',
                    ])
                ]
            ])

            ->add('submit', SubmitType::class);;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Gamerules::class,
        ]);
    }
}
