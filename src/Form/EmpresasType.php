<?php

namespace App\Form;

use App\Entity\Empresas;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpresasType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Nombre',
            ])
            ->add('identificacion', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Identificación',
            ])
            ->add('nro_contrato', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Nro. Contrato',
                'required'=>false
            ])
            ->add('telefono', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Teléfono',
                'required'=>false
            ])
            ->add('correo', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Correo',
            ])
            ->add('siglas', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Siglas',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Empresas::class,
        ]);
    }
}
