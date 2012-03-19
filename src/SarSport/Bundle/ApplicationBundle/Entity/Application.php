<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Entity;

use SarSport\Bundle\ApplicationBundle\Model\Application as BaseApplication;
use SarSport\Bundle\UserBundle\Entity\User;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Application extends BaseApplication
{
    const RACE_NAME_MULTIGONKA = 'sarsport_application_multigonka';
    const RACE_NAME_VELOGONKA = 'sarsport_application_velogonka';

    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var User
     */
    protected $user;

    /**
     * {@inheritDoc}
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     *
     * @param User $user
     * @return Application
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }
}
