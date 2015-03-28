<?php namespace AdventureTimeBundle\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text',
            array('attr' =>
                array(
                    'autofocus' => true,
                    'autocomplete' => 'off',
                    'required' => true,
                    'placeholder' => 'login',
                ),
            ));

        $builder->add('email', 'text',
            array('attr' =>
                array(
                    'autofocus' => true,
                    'autocomplete' => 'off',
                    'required' => true,
                    'placeholder' => 'email',
                ),
            ));

        $builder->add('password', 'password',
            array('attr' =>
                array(
                    'autofocus' => true,
                    'autocomplete' => 'off',
                    'required' => true,
                    'placeholder' => 'password',
                ),
            ));

        $builder->add('password_confirm', 'password',
            array('attr' =>
                array(
                    'autofocus' => true,
                    'autocomplete' => 'off',
                    'required' => true,
                    'placeholder' => 'password confirm',
                ),
            ));


        $builder->add('submit', 'submit',
            array(
                'label' => 'Registration',
            ));
    }

    public function getName()
    {
        return 'registration';
    }
}
