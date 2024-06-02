<?php

namespace App\Form;

use DateError;
use DateException;
use App\Entity\User;
use App\Entity\Command;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;

class CommandType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nb_people', IntegerType::class, [
                'label' => 'Number of People',
                'attr' => ['min' => 1, 'max' => 20],
            ])
            ->add('message')
            ->add('date', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new NotBlank(),
                    new GreaterThanOrEqual([
                        'value' => (new \DateTime())->setTime(0, 0, 0),
                        'message' => 'The date must be today or in the future.',
                    ]),
                ],
            ])
            ->add('time', null, [
                'widget' => 'single_text',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Command::class,
        ]);
    }
}
