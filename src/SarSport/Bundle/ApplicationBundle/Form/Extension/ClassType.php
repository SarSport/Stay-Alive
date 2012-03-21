<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Form\Extension;

use Symfony\Component\Form\AbstractType;
use SarSport\Bundle\ApplicationBundle\Entity\Application;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ClassType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent(array $options)
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        return array('choices'=> array(
            Application::APPLICATION_CLASS_SPORT_VALUE => Application::APPLICATION_CLASS_SPORT_NAME,
            Application::APPLICATION_CLASS_TOURISM_VALUE => Application::APPLICATION_CLASS_TOURISM_NAME
        ));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sarsport_application_form_type_class';
    }

}
