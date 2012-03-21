<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\EventListener;

use SarSport\Bundle\ApplicationBundle\Events;
use SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use DateTime;

/**
 * Updates date and time in the application
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationUpdatedAtListener implements EventSubscriberInterface
{
    /**
     * Update DateTime value in application
     *
     * @param \SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent $event
     * @return void
     */
    public function setUpdatedAt(ApplicationEvent $event)
    {
        $application = $event->getApplication();

        if ($application->getId() != null) {
            $application->setUpdatedAt(new DateTime('now'));
        }
    }

    static public function getSubscribedEvents()
    {
        return array(Events::APPLICATION_PRE_PERSIST => 'setUpdatedAt');
    }
}
