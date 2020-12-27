<?php

namespace App\Form;

use App\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rut', TextType::class, [
                    'label' => 'Rut',
                    'attr' => ['class' => 'validate']
                ])
            ->add('nombre', TextType::class, [
                    'label' => 'Nombre',
                    'attr' => ['class' => 'validate']
                ])
            ->add('apellidos', TextType::class, [
                    'label' => 'Apellidos',
                    'attr' => ['class' => 'validate']
                ])
            ->add('password', PasswordType::class, [
                    'label' => 'Password',
                    'attr' => ['class' => 'validate']
                ])
                
            ->add('submit', SubmitType::class, [
                    'label' => 'Guardar',
                    'attr' => ['class' => 'btn waves-effect waves-light'],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuario::class,
        ]);
    }
}
