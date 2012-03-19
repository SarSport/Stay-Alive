<?php

namespace SarSport\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('teamName')
            ->add('firstPlayerName')
            ->add('firstPlayerPhonenumber')
            ->add('secondPlayerName')
            ->add('secondPlayerPhonenumber')
            ->add('comment')
            ->add('additionalMaps')
            ->add('tShirt')
            ->add('raceName')
            ->add('user')
        ;
    }

    public function getName()
    {
        return 'sarsport_application_application';
    }
}
