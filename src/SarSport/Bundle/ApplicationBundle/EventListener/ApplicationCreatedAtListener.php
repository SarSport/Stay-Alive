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
use SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface;
use SarSport\Bundle\ApplicationBundle\Model\SignedApplicationInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;
use DateTime;

/**
 * Updates date and time in the application
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationCreatedAtListener implements EventSubscriberInterface
{
    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * Constructor.
     *
     * @param SecurityContextInterface $securityContext
     * @param LoggerInterface $logger
     */
    public function __construct(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    /**
     * Update DateTime value in application
     *
     * @param \SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent $event
     * @return void
     */
    public function setCreatedAt(ApplicationEvent $event)
    {
        $application= $event->getApplication();
        $application->setCreatedAt(new DateTime('now'));
    }

    static public function getSubscribedEvents()
    {
        return array(Events::APPLICATION_CREATE => 'setCreatedAt');
    }
}
