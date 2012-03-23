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
interface ApplicationInterface
{
    /**
     * @param boolean $additionalMaps
     * @return ApplicationInterface
     */
    public function setAdditionalMaps($additionalMaps);

    /**
     * @return boolean
     */
    public function getAdditionalMaps();

    /**
     * @param string $comment
     * @return ApplicationInterface
     */
    public function setComment($comment);

    /**
     * @return string
     */
    public function getComment();

    /**
     * @param string $firstPlayerName
     * @return ApplicationInterface
     */
    public function setFirstPlayerFirstName($firstPlayerName);

    /**
     * @return string
     */
    public function getFirstPlayerFirstName();

    /**
     * @param string $phonenubmer
     * @return ApplicationInterface
     */
    public function setPhonenumber($phonenubmer);

    /**
     * @return string
     */
    public function getPhonenumber();

    /**
     * @return int
     */
    public function getId();

    /**
     * @param string $secondPlayerName
     * @return ApplicationInterface
     */
    public function setSecondPlayerFirstName($secondPlayerName);

    /**
     * @return string
     */
    public function getSecondPlayerFirstName();

    /**
     * @param string $teamName
     * @return ApplicationInterface
     */
    public function setTeamName($teamName);

    /**
     * @return string
     */
    public function getTeamName();

    /**
     * @param string $competition
     * @return ApplicationInterface
     */
    public function setCompetition($competition);

    /**
     * @return string
     */
    public function getCompetition();

    /**
     * @param boolean $firstPlayerTShirt
     * @return ApplicationInterface
     */
    public function setFirstPlayerTShirt($firstPlayerTShirt);

    /**
     * @return boolean
     */
    public function getFirstPlayerTShirt();

    /**
     * @param boolean $secondPlayerTShirt
     * @return ApplicationInterface
     */
    public function setSecondPlayerTShirt($secondPlayerTShirt);

    /**
     * @return boolean
     */
    public function getSecondPlayerTShirt();

    /**
     * @param int $status
     * @return ApplicationInterface
     */
    public function setStatus($status);

    /**
     * @return int
     */
    public function getStatus();

    /**
     * @param DateTime $time
     * @return ApplicationInterface
     */
    public function setCreatedAt(DateTime $time);

    /**
     * @return DateTime
     */
    public function getCreatedAt();

    /**
     * @param DateTime|null $updatedAt
     * @return ApplicationInterface
     */
    public function setUpdatedAt(DateTime $updatedAt);

    /**
     * @return DateTime|null
     */
    public function getUpdatedAt();

    /**
     * @param integer $firstPlayerBirthday
     * @return ApplicationInterface
     */
    public function setFirstPlayerBirthday($firstPlayerBirthday);

    /**
     * @return integer
     */
    public function getFirstPlayerBirthday();

    /**
     * @param integer $firstPlayerSex
     * @return ApplicationInterface
     */
    public function setFirstPlayerSex($firstPlayerSex);

    /**
     * @return int
     */
    public function getFirstPlayerSex();

    /**
     * @param string $group
     * @return ApplicationInterface
     */
    public function setGroup($group);

    /**
     * @return string
     */
    public function getGroup();

    /**
     * @param integer|null $secondPlayerBirthday
     * @return ApplicationInterface
     */
    public function setSecondPlayerBirthday($secondPlayerBirthday);

    /**
     * @return integer|null
     */
    public function getSecondPlayerBirthday();

    /**
     * @param int|null $secondPlayerSex
     * @return ApplicationInterface
     */
    public function setSecondPlayerSex($secondPlayerSex);

    /**
     * @return int|null
     */
    public function getSecondPlayerSex();

    /**
     * @param string $city
     * @return ApplicationInterface
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param string $class
     * @return ApplicationInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param string $firstPlayerLastName
     * @return ApplicationInterface
     */
    public function setFirstPlayerLastName($firstPlayerLastName);

    /**
     * @return string
     */
    public function getFirstPlayerLastName();

    /**
     * @param string $secondPlayerLastName
     * @return ApplicationInterface
     */
    public function setSecondPlayerLastName($secondPlayerLastName);

    /**
     * @return string
     */
    public function getSecondPlayerLastName();
}
