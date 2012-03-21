<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Model;

use Symfony\Component\Security\Core\User\UserInterface;

/**
 * A signed application is bound to a FOS\UserBundle User model.
 *
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
interface SignedApplicationInterface extends ApplicationInterface
{
    /**
     * Sets the owner of the application
     *
     * @param UserInterface $user
     */
    function setUser(UserInterface $user);

    /**
     * Gets the owner of the application
     *
     * @return UserInterface
     */
    function getUser();
}
