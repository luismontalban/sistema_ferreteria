<?php

namespace App\Form;

use App\Entity\Venta;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\DateType;


class VentaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('cantidad', IntegerType::class, [
                    'label' => 'Cantidad',
                    'attr' => ['class' => 'validate']
                ])
            ->add('fecha', DateType::class, [
                    'widget' => 'single_text',
    
                    'format' => 'yyyy-MM-dd',
                ])
            ->add('descripcion', TextType::class, [
                    'label' => 'Descripcion',
                    'attr' => ['class' => 'validate']
                ])
                
            ->add('submit', SubmitType::class, [
                    'label' => 'Guardar',
                    'attr' => ['class' => 'btn waves-effect waves-light'],
        ]);
//            ->add('usuario')
//            ->add('producto')
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Venta::class,
        ]);
    }
}
