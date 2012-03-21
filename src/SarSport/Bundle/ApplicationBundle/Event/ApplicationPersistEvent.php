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

/**
 * An event related to a persisting event that can be
 * cancelled by a listener.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationPersistEvent extends ApplicationEvent implements PersistEventInterface
{
    /**
     * @var bool
     */
    private $abortPersistence = false;

    /**
     * Indicates that the persisting operation should not proceed.
     */
    public function abortPersistence()
    {
        $this->abortPersistence = true;
    }

    /**
     * Checks if a listener has set the event to abort the persisting
     * operation.
     *
     * @return bool
     */
    public function isPersistenceAborted()
    {
        return $this->abortPersistence;
    }
}
