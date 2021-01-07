<?php

namespace App\Form;

use App\Entity\Achat;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class AchatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('TypeAchat')
            ->add('PrixAchat')
            ->add('DateAchat')
            ->add('NumeroFacture')
            ->add('User')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Achat::class,
        ]);
    }
}
