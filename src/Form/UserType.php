<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Usuario',
            ])
            ->add('name', TextType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Nombre completo',
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Contraseña',
            ])
            ->add('repeat_password', PasswordType::class, [
                'attr' => ['class' => 'w-100'],
                'label' => 'Repetir contraseña',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
