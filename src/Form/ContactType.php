<?php

namespace App\Form;

use App\Entity\Occasion;
use App\Entity\Contact;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;



class ContactType extends AbstractType
{

    private $security;
    public function __construct(Security $security)
    {
        $this->security = $security;
    }


    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir votre nom'
                ]
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir votre email'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir votre téléphone'
                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Message',
                'constraints' => [new Length(['min' => 2, 'max' => 30]), new NotBlank()],
                'attr' => [
                    'placeholder' => 'saisir votre message'
                ]
            ]);


        if ($this->security->isGranted('ROLE_USER')) {
            $builder->add('vu', IntegerType::class, [

                'label' => 'Vu',
                'attr' => [
                    'placeholder' => 'saisir 1 si vu'
                ]
            ])

                ->add('action', TextType::class, [

                    'label' => 'Action effectuée',
                    'attr' => [
                        'placeholder' => 'saisir action effectuée'
                    ]
                ]);
        }

        $builder->add('submit', SubmitType::class, [
            'label' => "S'inscrire"
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
