<?php

namespace App\Form;

use App\Entity\Voiture;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoitureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la voiture'
            ])
            ->add('description', TextareaType::class, [
                'label' => 'Description de la voiture'
            ])
            ->add('priceMonth', NumberType::class, [
                'label' => 'Prix par mois'
            ])
            ->add('priceDays', NumberType::class, [
                'label' => 'Prix par jour'
            ])
            ->add('numberPlaces', ChoiceType::class, [
                'label' => 'Nombre de places',
                'choices' => [
                    '1' => 1,
                    '2' => 2,
                    '4' => 4,
                    '5' => 5,
                    '7' => 7,
                    '8' => 8,
                    '9' => 9
                ]
            ])
            ->add('isAutomatic', ChoiceType::class, [
                'label' => 'Boite de vitesse',
                'choices' => [
                    'Automatique' => "Automatique",
                    'Manuelle' => "Manuelle"
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Voiture::class,
        ]);
    }
}
