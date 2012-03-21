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

use DateTime;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Application implements ApplicationInterface
{
    /**
     * @var int $id
     */
    protected $id;

    /**
     * @var string $teamName
     */
    protected $teamName;

    /**
     * @var string
     */
    protected $firstPlayerName;

    /**
     * @var string
     */
    protected $phonenumber;

    /**
     * @var string
     */
    protected $secondPlayerName;

    /**
     * @var string
     */
    protected $comment;

    /**
     * @var boolean
     */
    protected $additionalMaps;

    /**
     * @var boolean
     */
    protected $firstPlayerTShirt;

    /**
     * @var boolean
     */
    protected $secondPlayerTShirt;

    /**
     * @var string
     */
    protected $competition;

    /**
     * @var int
     */
    protected $status = 0;

    /**
     * @var DateTime
     */
    protected $createdAt;

    /**
     * @var DateTime|null
     */
    protected $updatedAt;

    /**
     * @var DateTime
     */
    protected $firstPlayerBirthday;

    /**
     * @var DateTime|null
     */
    protected $secondPlayerBirthday;

    /**
     * @var integer
     */
    protected $firstPlayerSex;

    /**
     * @var integer|null
     */
    protected $secondPlayerSex;

    /**
     * @var string
     */
    protected $group;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var string
     */
    protected $city;

    /**
     * {@inheritDoc}
     *
     * @param boolean $additionalMaps
     * @return Application
     */
    public function setAdditionalMaps($additionalMaps)
    {
        $this->additionalMaps = $additionalMaps;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return boolean
     */
    public function getAdditionalMaps()
    {
        return $this->additionalMaps;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $comment
     * @return Application
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $firstPlayerName
     * @return Application
     */
    public function setFirstPlayerName($firstPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getFirstPlayerName()
    {
        return $this->firstPlayerName;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $phonenubmer
     * @return Application
     */
    public function setPhonenumber($phonenubmer)
    {
        $this->phonenumber = $phonenubmer;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getPhonenumber()
    {
        return $this->phonenumber;
    }

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
     * @param string $secondPlayerName
     * @return Application
     */
    public function setSecondPlayerName($secondPlayerName)
    {
        $this->secondPlayerName = $secondPlayerName;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getSecondPlayerName()
    {
        return $this->secondPlayerName;
    }

    /**
     * {@inheritDoc}
     *
     * @param string $teamName
     * @return Application
     */
    public function setTeamName($teamName)
    {
        $this->teamName = $teamName;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getTeamName()
    {
        return $this->teamName;
    }

    /**
     * @param string $competition
     * @return Application
     */
    public function setCompetition($competition)
    {
        $this->competition = $competition;

        return $this;
    }

    /**
     * @return string
     */
    public function getCompetition()
    {
        return $this->competition;
    }

    /**
     * @param boolean $firstPlayerTShirt
     * @return Application
     */
    public function setFirstPlayerTShirt($firstPlayerTShirt)
    {
        $this->firstPlayerTShirt = $firstPlayerTShirt;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getFirstPlayerTShirt()
    {
        return $this->firstPlayerTShirt;
    }

    /**
     * @param boolean $secondPlayerTShirt
     * @return Application
     */
    public function setSecondPlayerTShirt($secondPlayerTShirt)
    {
        $this->secondPlayerTShirt = $secondPlayerTShirt;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSecondPlayerTShirt()
    {
        return $this->secondPlayerTShirt;
    }

    /**
     * @param int $status
     * @return Application
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param DateTime $time
     * @return Application
     */
    public function setCreatedAt(DateTime $time)
    {
        $this->createdAt = $time;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param DateTime|null $updatedAt
     * @return Application
     */
    public function setUpdatedAt(DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param DateTime $firstPlayerBirthday
     * @return Application
     */
    public function setFirstPlayerBirthday(DateTime $firstPlayerBirthday)
    {
        $this->firstPlayerBirthday = $firstPlayerBirthday;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getFirstPlayerBirthday()
    {
        return $this->firstPlayerBirthday;
    }

    /**
     * @return Application
     */
    public function setFirstPlayerSex($firstPlayerSex)
    {
        $this->firstPlayerSex = $firstPlayerSex;

        return $this;
    }

    /**
     * @return int
     */
    public function getFirstPlayerSex()
    {
        return $this->firstPlayerSex;
    }

    /**
     * @param string $group
     * @return Application
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param DateTime|null $secondPlayerBirthday
     * @return Application
     */
    public function setSecondPlayerBirthday($secondPlayerBirthday)
    {
        $this->secondPlayerBirthday = $secondPlayerBirthday;

        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getSecondPlayerBirthday()
    {
        return $this->secondPlayerBirthday;
    }

    /**
     * @param int|null $secondPlayerSex
     * @return Application
     */
    public function setSecondPlayerSex($secondPlayerSex)
    {
        $this->secondPlayerSex = $secondPlayerSex;

        return $this;
    }

    /**
     * @return int|null
     */
    public function getSecondPlayerSex()
    {
        return $this->secondPlayerSex;
    }

    /**
     * @param string $city
     * @return Application
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $class
     * @return Application
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }
}
