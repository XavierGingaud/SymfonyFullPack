<?php

namespace App\Form;

use App\Entity\Bien;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class BienType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                ]
            ])
            ->add('description', TextareaType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                ]
            ])
            ->add('price', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                ]
            ])
            ->add('category', ChoiceType::class, [
                'choices' => [
                    'Location' => 'location',
                    'Vente' => 'vente',
                ],

                'attr' => [
                    'class' => 'custom-select mb-4'
                ]
            ])
            ->add('image', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-4',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Bien::class,
        ]);
    }
}
