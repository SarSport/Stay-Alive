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
use SarSport\Bundle\ApplicationBundle\Model\SignedApplicationInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Application extends BaseApplication implements SignedApplicationInterface
{
    const RACE_MULTIGONKA_SLUG = 'stay-alive';
    const RACE_VELOGONKA_SLUG = 'giant';
    const RACE_MULTIGONKA_NAME = 'application.competitions_name.multigonka';
    const RACE_VELOGONKA_NAME = 'application.competitions_name.velogonka';

    const APPLICATION_SEX_MAN_NAME = 'application.sex_name.man';
    const APPLICATION_SEX_WOMAN_NAME = 'application.sex_name.woman';
    const APPLICATION_SEX_MAN_VALUE = 1;
    const APPLICATION_SEX_WOMAN_VALUE = 2;

    const APPLICATION_GROUP_M_NAME = 'application.group_name.m';
    const APPLICATION_GROUP_MW_NAME = 'application.group_name.mw';
    const APPLICATION_GROUP_MR_NAME = 'application.group_name.mr';
    const APPLICATION_GROUP_MWR_NAME = 'application.group_name.mwr';
    const APPLICATION_GROUP_M_VALUE = 1;
    const APPLICATION_GROUP_MW_VALUE = 2;
    const APPLICATION_GROUP_MR_VALUE = 3;
    const APPLICATION_GROUP_MWR_VALUE = 4;

    const APPLICATION_CLASS_SPORT_NAME = 'application.class_name.sport';
    const APPLICATION_CLASS_TOURISM_NAME = 'application.class_name.tourism';
    const APPLICATION_CLASS_SPORT_VALUE = 1;
    const APPLICATION_CLASS_TOURISM_VALUE = 2;

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
    public function setUser(UserInterface $user)
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
