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
     * @param string $firstPlayerPhonenubmer
     * @return ApplicationInterface
     */
    public function setFirstPlayerPhonenumber($firstPlayerPhonenubmer);

    /**
     * @return string
     */
    public function getFirstPlayerPhonenumber();

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
     * @param string $secondPlayerPhonenumber
     * @return ApplicationInterface
     */
    public function setSecondPlayerPhonenumber($secondPlayerPhonenumber);

    /**
     * @return string
     */
    public function getSecondPlayerPhonenumber();

    /**
     * @param boolean $tShirt
     * @return ApplicationInterface
     */
    public function setTShirt($tShirt);

    /**
     * @return boolean
     */
    public function getTShirt();

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
     * @param string $raceName
     * @return ApplicationInterface
     */
    public function setRaceName($raceName);

    /**
     * @return string
     */
    public function getRaceName();

    /**
     * @param object $user
     * @return ApplicationInterface
     */
    public function setUser($user);

    /**
     * @return object
     */
    public function getUser();
}
