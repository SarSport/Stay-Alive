<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Application\Bundle\DefaultBundle\Entity;

use Fightmaster\Bundle\GalleryBundle\Entity\Gallery as BaseGallery;
use SarSport\Bundle\UserBundle\Entity\User;
use Fightmaster\Bundle\GalleryBundle\Model\SignedGalleryInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Gallery extends BaseGallery implements SignedGalleryInterface
{
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
