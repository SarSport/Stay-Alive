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
use SarSport\Bundle\ApplicationBundle\Model\SignedApplicationInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Security\Core\SecurityContextInterface;

/**
 * Blames a application using Symfony2 security component
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationBlamerListener implements EventSubscriberInterface
{
    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * @var LoggerInterface
     */
    protected $logger;

    /**
     * Constructor.
     *
     * @param SecurityContextInterface $securityContext
     * @param LoggerInterface $logger
     */
    public function __construct(SecurityContextInterface $securityContext, LoggerInterface $logger = null)
    {
        $this->securityContext = $securityContext;
        $this->logger = $logger;
    }

    /**
     * Assigns the currently logged in user to a Application.
     *
     * @param \SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent $event
     * @return void
     */
    public function blame(ApplicationEvent $event)
    {
        $application = $event->getApplication();

        if (!$application instanceof SignedApplicationInterface) {
            if ($this->logger) {
                $this->logger->debug("Application does not implement SignedApplicationInterface, skipping");
            }

            return;
        }

        if (null === $this->securityContext->getToken()) {
            if ($this->logger) {
                $this->logger->debug("There is no firewall configured. We cant get a user.");
            }

            return;
        }

        if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY') && $application->getUser() == null) {
            $application->setUser($this->securityContext->getToken()->getUser());
        }
    }

    static public function getSubscribedEvents()
    {
        return array(Events::APPLICATION_PRE_PERSIST => 'blame');
    }
}
