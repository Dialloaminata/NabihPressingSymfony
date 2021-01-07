<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;




class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom',TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le  nom du client doit contenir au moins {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('prenom',TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le  prenom du client doit contenir au moins {{ limit }} caractères.',
                    ]),
                ],
            ])
            ->add('addresse',TextType::class, [
                'constraints' => [
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Addresse incorrect',
                    ]),
                    
                ],
            ])
            ->add('numero')
           
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}

