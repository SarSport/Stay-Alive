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
class GroupType extends AbstractType
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
            Application::APPLICATION_GROUP_M_VALUE => Application::APPLICATION_GROUP_M_NAME,
            Application::APPLICATION_GROUP_MW_VALUE => Application::APPLICATION_GROUP_MW_NAME,
            Application::APPLICATION_GROUP_MR_VALUE => Application::APPLICATION_GROUP_MR_NAME,
            Application::APPLICATION_GROUP_MWR_VALUE => Application::APPLICATION_GROUP_MWR_NAME
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
