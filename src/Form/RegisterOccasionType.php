<?php

namespace App\Form;

use App\Entity\Occasion;
use Doctrine\DBAL\Types\BooleanType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\NotNull;

class RegisterOccasionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder

            ->add('marque', TextType::class, [
                'label' => 'Marque',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir la marque'
                ]
            ])
            ->add('modele', TextType::class, [
                'label' => 'Modéle',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le modéle'
                ]
            ])
            ->add('prix', IntegerType::class, [
                'label' => 'Prix',
                'constraints' => [new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le prix'
                ]
            ])
            ->add('kilometrage', IntegerType::class, [
                'label' => 'Kilométrage',
                'constraints' => [new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le kilométrage'
                ]
            ])
            ->add('places', IntegerType::class, [
                'label' => 'Places',
                'constraints' => [new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le nombre de places'
                ]
            ])
            ->add('motorisation', TextType::class, [
                'label' => 'Motorisation',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le type de motorisation'
                ]
            ])
            ->add('year', IntegerType::class, [
                'label' => 'années de mise en circulation',
                'constraints' => [new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir le nbr d\'années depuis la mise en circulation'
                ]
            ])
            ->add("file", FileType::class, [
                'label' => 'image1',
                "required" => false,
                "mapped" => false,
                "constraints" => [
                    new Image(),
                    new NotNull()
                ]
            ])
            ->add("file2", FileType::class, [
                'label' => 'image2',
                "required" => false,
                "mapped" => false,
                "constraints" => [
                    new Image(),
                    new NotNull()
                ]
            ])
            ->add("file3", FileType::class, [
                'label' => 'image3',
                "required" => false,
                "mapped" => false,
                "constraints" => [
                    new Image(),
                    new NotNull()
                ]
            ])
            ->add("sold", BooleanType::class, [
                'label' => 'vendue',
                "required" => true,
                "constraints" => [
                    new NotNull()
                ]
            ])

            ->add('submit', SubmitType::class, [
                'label' => "S'inscrire"
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Occasion::class,
        ]);
    }
}
