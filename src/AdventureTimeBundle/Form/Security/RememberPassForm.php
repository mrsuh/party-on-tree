<?php namespace AdventureTimeBundle\Form\Security;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RememberPassForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('username', 'text', array('attr' => array('autofocus' => true, 'autocomplete' => 'off', 'required' => true, 'placeholder' => 'email',),));

        $builder->add('submit', 'submit', array('label' => 'Отправить',));
    }

    public function getName()
    {
        return 'registration';
    }
}
