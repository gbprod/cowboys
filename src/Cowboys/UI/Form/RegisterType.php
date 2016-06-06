<?php

namespace Cowboys\UI\Form;

use Cowboys\AppBundle\Command\RegisterCommand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type as Type;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form to register
 *
 * @author gbprod <contact@gb-prod.fr>
 */
class RegisterType extends AbstractType
{
    /**
     * {inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', Type\TextType::class, [
                'required' => true,
                'label'    => 'Quel est ton nom étranger ?',
                'attr'     => [
                    'placeholder' => 'exemple: Billy the kid',
                ]
            ])
            ->add('email', Type\EmailType::class, [
                'required' => true,
                'label'    => 'Il me faut aussi une adresse pour te contacter',
                'attr'     => [
                    'placeholder' => 'email@exemple.com',
                ]
            ])
            ->add('password', Type\PasswordType::class, [
                'required' => true,
                'label'    => 'Il me faut aussi un code secret pour te reconnaitre',
            ])
            ->add('submit', Type\SubmitType::class, [
                'label' => 'Ajouter ça au registre',
            ])
        ;
    }

    /**
     * {inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegisterCommand::class,
        ]);
    }
}