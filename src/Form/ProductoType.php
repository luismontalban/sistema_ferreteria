<?php

namespace App\Form;

use App\Entity\Producto;
use App\Entity\Categoria;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ProductoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        
        $cate = new Categoria();
        
        $builder
            ->add('codigo', TextType::class, [
                    'label' => 'Codigo',
                    'attr' => ['class' => 'validate']
                ])
            ->add('nombre', TextType::class, [
                    'label' => 'Nombre',
                    'attr' => ['class' => 'validate']
                ])
            ->add('descripcion', TextType::class, [
                    'label' => 'Descripcion',
                    'attr' => ['class' => 'validate']
                ])
            ->add('precio', MoneyType::class, [
                    'label' => 'Precio',
                    'attr' => ['class' => 'validate']
                ])
            ->add('stock', IntegerType::class, [
                    'label' => 'Stock disponible',
                    'attr' => ['class' => 'validate']
                ])
            ->add('categoria', EntityType::class, [
                    'label' => 'Categoria',
                    'class' => Categoria::class,
                     'choices' => $cate->getNombre(),
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
            'data_class' => Producto::class,
        ]);
    }
}
