<?php

namespace App\Form;

use App\Entity\OccasionSearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\RangeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OccasionSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('maxPrice', RangeType::class, [
                'required' => false,
                'label' => 'Prix max',

                'attr' => [
                    'value' => 0,
                    'min' => 0,
                    'max' => 80000,
                    'step' => 1000
                ],
            ])
            ->add('maxKilometre', RangeType::class, [
                'required' => false,
                'label' => 'Kilométres max',

                'attr' => [
                    'value' => 0,
                    'min' => 0,
                    'max' => 300000,
                    'step' => 5000
                ],
            ])
            ->add('maxYear', RangeType::class, [
                'required' => false,
                'label' => 'Année max',

                'attr' => [
                    'value' => 0,
                    'min' => 0,
                    'max' => 30,
                    'step' => 1
                ],
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => OccasionSearch::class,
            'method' => 'get',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
