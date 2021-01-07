<?php

namespace App\Form;
use App\Entity\TypeHabit;
use App\Entity\LotHabit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class LotHabitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ReferenceLot')
            ->add('Etat')
            ->add('Client')
            ->add('Prix')
           
            ->add('DateDepot')
            ->add('DateRetrait')
            ->add('Habit',EntityType::class, [
                'class' => TypeHabit::class,
                'multiple' => true,
                'expanded' => true,
            ])
         
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LotHabit::class,
        ]);
    }
}
