<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Fooditem;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class FooditemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('photo')
            ->add('price')
            ->add('description')
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Start' => 'start',
                    'Breakfast' => 'breakfast',
                    'Lunch' => 'lunch',
                    'Dinner' => 'dinner',
                ],])
            ->add('nameFood');
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Fooditem::class,
        ]);
    }
}
