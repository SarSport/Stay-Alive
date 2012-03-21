<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
final class Events
{
    /**
     * The PRE_PERSIST event occurs prior to the persistence backend
     * persisting the application.
     *
     * This event allows you to modify the data in the application prior
     * to persisting occuring. The listener receives a
     * SarSport\Bundle\ApplciationBundle\Event\ApplicationPersistEvent instance.
     *
     * Persisting of the application can be aborted by calling
     * $event->abortPersist()
     *
     * @var string
     */
    const APPLICATION_PRE_PERSIST = 'sarsport_application.application.pre_persist';

    /**
     * The POST_PERSIST event occurs after the persistence backend
     * persisted the application.
     *
     * This event allows you to notify users or perform other actions
     * that might require the application to be persisted before performing
     * those actions. The listener receives a
     * SarSport\Bundle\ApplciationBundle\Event\ApplicationEvent instance.
     *
     * @var string
     */
    const APPLICATION_POST_PERSIST = 'sarsport_application.application.post_persist';
    /**
     * The PRE_REMOVE event occurs prior to the removing the application.
     *
     * This event allows you to modify the data in the application prior
     * to removing occuring. The listener receives a
     * SarSport\Bundle\ApplciationBundle\Event\ApplicationRemoveEvent instance.
     *
     * Removing of the application can be aborted by calling
     * $event->abortRemove()
     *
     * @var string
     */
    const APPLICATION_PRE_REMOVE = 'sarsport_application.application.pre_remove';

    /**
     * The POST_REOVE event occurs after the remove backend
     * persisted the application.
     *
     * This event allows you to notify users or perform other actions
     * that might require the application to be removed before performing
     * those actions. The listener receives a
     * SarSport\Bundle\ApplciationBundle\Event\ApplicationEvent instance.
     *
     * @var string
     */
    const APPLICATION_POST_REMOVE = 'sarsport_application.application.post_remove';

    /**
     * The CREATE event occurs when the manager is asked to create
     * a new instance of a application.
     *
     * The listener receives a SarSport\Bundle\ApplciationBundle\Event\ApplicationEvent
     * instance.
     *
     * @var string
     */
    const APPLICATION_CREATE = 'sarsport_application.application.create';
}
