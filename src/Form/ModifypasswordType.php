<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ModifypasswordType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('oldPassword', PasswordType::class, array(
            'mapped' => false
            ))
             ->add('plainPassword', RepeatedType::class, array(
            'type' => PasswordType::class,
            
            ))
            
             ->add('submit', SubmitType::class, array(
            'attr' => array(
            'class' => 'btn btn-primary btn-block'
            )
             ))
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
