<?php
/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */

namespace SarSport\Bundle\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilder;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use SarSport\Bundle\UserBundle\Form\Type\Extension\SexType;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        parent::buildForm($builder, $options);

        // add your custom field
        $builder->add('firstName');
        $builder->add('lastName');
        $builder->add('secondName');
        $builder->add('birthday','birthday');
        $builder->add('sex', new SexType());
    }

    public function getName()
    {
        return 'sarsport_user_registration';
    }
}