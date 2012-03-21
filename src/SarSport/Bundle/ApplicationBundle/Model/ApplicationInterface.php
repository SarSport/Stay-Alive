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
    public function setFirstPlayerName($firstPlayerName);

    /**
     * @return string
     */
    public function getFirstPlayerName();

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
    public function setSecondPlayerName($secondPlayerName);

    /**
     * @return string
     */
    public function getSecondPlayerName();

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
     * @param DateTime $firstPlayerBirthday
     * @return ApplicationInterface
     */
    public function setFirstPlayerBirthday(DateTime $firstPlayerBirthday);

    /**
     * @return DateTime
     */
    public function getFirstPlayerBirthday();

    /**
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
     * @param DateTime|null $secondPlayerBirthday
     * @return ApplicationInterface
     */
    public function setSecondPlayerBirthday(DateTime $secondPlayerBirthday);

    /**
     * @return DateTime|null
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
}
