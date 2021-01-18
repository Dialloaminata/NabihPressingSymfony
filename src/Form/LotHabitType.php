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
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class LotHabitType extends AbstractType
{
    protected static $subjects = array('Subject A', 'Subject B', 'Subject C');
    public function buildForm(FormBuilderInterface $builder, array $options)
    
    {
        $builder
            ->add('ReferenceLot')
            ->add('Etat',ChoiceType::class, [
                'choices' => [
                    'Non Laves' =>  'Non Laves' ,
                    'En cours' =>  'En cours',
                    'Finis' => 'Finis',

                ]])
            ->add('Client')
            ->add('DateDepot')
            ->add('DateRetrait')
            ->add('Habit',EntityType::class, [
                'class' => TypeHabit::class,
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('Prix', TextType::class, [
                'data' =>' 1500',
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
