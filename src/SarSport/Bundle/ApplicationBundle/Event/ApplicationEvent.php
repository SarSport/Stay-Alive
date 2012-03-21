<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Event;

use Symfony\Component\EventDispatcher\Event;
use SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationEvent extends Event
{
    /**
     * @var ApplicationInterface
     */
    private $application;

    public function __construct(ApplicationInterface $application)
    {
        $this->application = $application;
    }

    /**
     * @return ApplicationInterface
     */
    public function getApplication()
    {
        return $this->application;
    }
}
