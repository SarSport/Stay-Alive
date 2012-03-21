<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use SarSport\Bundle\ApplicationBundle\Form\Extension\SexType;
use SarSport\Bundle\ApplicationBundle\Form\Extension\ClassType;
use SarSport\Bundle\ApplicationBundle\Form\Extension\CompetitionType;
use SarSport\Bundle\ApplicationBundle\Form\Extension\GroupType;

class ApplicationType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('competition', new CompetitionType(), array('label' => 'application.competition'))
            ->add('teamName', null, array('label' => 'application.teamName'))
            ->add('phonenumber', null, array('label' => 'application.phonenumber'))
            ->add('class', new ClassType(), array('label' => 'application.class'))
            ->add('group', new GroupType(), array('label' => 'application.group'))
            ->add('city', null, array('label' => 'application.city'))
            ->add('additionalMaps', null, array('label' => 'application.additionalMaps'))
            ->add('comment', null, array('label' => 'application.comment'))
            ->add('firstPlayerName', null, array('label' => 'application.player_fio'))
            ->add('firstPlayerBirthday', 'birthday', array('label' => 'application.birthday'))
            ->add('firstPlayerSex', new SexType(), array('label'=> 'application.sex'))
            ->add('firstPlayerTShirt', null, array('label' => 'application.t-shirt'))
            ->add('secondPlayerName', null, array('label' => 'application.player_fio'))
            ->add('secondPlayerBirthday', 'birthday', array('label' => 'application.birthday'))
            ->add('secondPlayerSex', new SexType(), array('label'=> 'application.sex'))
            ->add('secondPlayerTShirt', null,  array('label' => 'application.t-shirt'))
        ;
    }

    public function getName()
    {
        return 'sarsport_application_application';
    }
}
