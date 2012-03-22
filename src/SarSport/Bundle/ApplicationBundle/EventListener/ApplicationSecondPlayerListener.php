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

/**
 * Sets null to all second player attributes if it is null
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationSecondPlayerListener implements EventSubscriberInterface
{
    /**
     * Sets null to all second player attributes if it is null
     *
     * @param \SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent $event
     * @return void
     */
    public function checkSecondPlayer(ApplicationEvent $event)
    {
        $application = $event->getApplication();
        if ($application->getSecondPlayerFirstName() == null) {
            $application->setSecondPlayerFirstName(null);
            $application->setSecondPlayerBirthday(null);
            $application->setSecondPlayerSex(null);
            $application->setSecondPlayerTShirt(null);
        }
    }

    static public function getSubscribedEvents()
    {
        return array(Events::APPLICATION_PRE_PERSIST => 'checkSecondPlayer');
    }
}
