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

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class TShirtSizeType extends AbstractType
{
    /**
     * T-shirt sizes
     *
     * @var array
     */
    public static $tShirtSizes = array(44 => 44, 46 => 46, 48 => 48, 50 => 50, 52 => 52, 54 => 54);

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
        return array('choices'=> static::getTShirtSizes());
    }

    /**
     * {@inheritDoc}
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sarsport_application_form_type_tshirt_size';
    }

    /**
     * Returns t-shirt sizes
     *
     * @static
     * @return array
     */
    public static function getTShirtSizes()
    {
        return static::$tShirtSizes;
    }
}
