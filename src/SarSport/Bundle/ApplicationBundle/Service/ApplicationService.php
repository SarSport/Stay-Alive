<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace SarSport\Bundle\ApplicationBundle\Service;

use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use SarSport\Bundle\ApplicationBundle\Entity\ApplicationManager;;
use SarSport\Bundle\ApplicationBundle\Event\ApplicationPersistEvent;
use SarSport\Bundle\ApplicationBundle\Event\ApplicationRemoveEvent;
use SarSport\Bundle\ApplicationBundle\Event\ApplicationEvent;
use SarSport\Bundle\ApplicationBundle\Exception\ApplicationException;
use SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface;
use SarSport\Bundle\ApplicationBundle\Events;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationService
{
    /**
     * @var EventDispatcherInterface
     */
    protected $dispatcher;

    /**
     * @var ApplicationManager
     */
    protected $manager;

    public function __construct(EventDispatcherInterface $eventDispatcher, ApplicationManager $manager)
    {
        $this->dispatcher = $eventDispatcher;
        $this->manager = $manager;
    }

    /**
     * Saves application entities
     *
     * @param \SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface $application
     * @throws ApplicationException
     */
    public function save(ApplicationInterface $application)
    {
        $event = new ApplicationPersistEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_PRE_PERSIST, $event);

        if ($event->isPersistenceAborted()) {
            throw ApplicationException::savingAbortedByPrePersistEvent();
        }

        $this->manager->save($application, true);

        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_POST_PERSIST, $event);
    }

    /**
     * Removes application entities
     *
     * @param \SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface $application
     * @throws ApplicationException
     */
    public function remove(ApplicationInterface $application)
    {
        $event = new ApplicationRemoveEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_PRE_REMOVE, $event);

        if ($event->isRemovingAborted()) {
            throw ApplicationException::removingAbortedByPreRemovingEvent();
        }

        $this->manager->remove($application, true);

        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_POST_REMOVE, $event);
    }

    /**
     * Saves application entities
     *
     * @param $application
     * @throws \SarSport\Bundle\ApplicationBundle\Exception\PublicationException
     */
    public function create()
    {
        $application = $this->manager->create();
        $event = new ApplicationEvent($application);
        $this->getDispatcher()->dispatch(Events::APPLICATION_CREATE, $event);

        return $application;
    }

    /**
     * Returns application
     * @param int $id
     * @return PublicationInterface
     */
    public function findApplicationById($id)
    {
        return $this->manager->find($id);
    }

    /**
     * @param $competition
     * @return Application[]
     */
    public function findByCompetition($competition)
    {
        return $this->manager->findByCompetition($competition);
    }

    /**
     * Returns EventDispatcher
     *
     * @return \Symfony\Component\EventDispatcher\EventDispatcherInterface
     */
    protected function getDispatcher()
    {
        return $this->dispatcher;
    }
}
