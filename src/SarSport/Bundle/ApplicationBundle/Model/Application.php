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
     * @var object User
     */
    protected $user;

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
    protected $firstPlayerPhonenumber;

    /**
     * @var string
     */
    protected $secondPlayerName;

    /**
     * @var string
     */
    protected $secondPlayerPhonenumber;

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
    protected $tShirt;

    /**
     * @var string
     */
    protected $raceName;

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
     * @param string $firstPlayerPhonenubmer
     * @return Application
     */
    public function setFirstPlayerPhonenumber($firstPlayerPhonenubmer)
    {
        $this->firstPlayerPhonenumber = $firstPlayerPhonenubmer;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getFirstPlayerPhonenumber()
    {
        return $this->firstPlayerPhonenumber;
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
     * @param string $secondPlayerPhonenumber
     * @return Application
     */
    public function setSecondPlayerPhonenumber($secondPlayerPhonenumber)
    {
        $this->secondPlayerPhonenumber = $secondPlayerPhonenumber;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getSecondPlayerPhonenumber()
    {
        return $this->secondPlayerPhonenumber;
    }

    /**
     * {@inheritDoc}
     *
     * @param boolean $tShirt
     * @return Application
     */
    public function setTShirt($tShirt)
    {
        $this->tShirt = $tShirt;

        return $this;
    }

    /**
     * {@inheritDoc}
     *
     * @return boolean
     */
    public function getTShirt()
    {
        return $this->tShirt;
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
     * {@inheritDoc}
     *
     * @param object $user
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
     * @return object
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $raceName
     * @return Application
     */
    public function setRaceName($raceName)
    {
        $this->raceName = $raceName;

        return $this;
    }

    /**
     * @return string
     */
    public function getRaceName()
    {
        return $this->raceName;
    }
}
