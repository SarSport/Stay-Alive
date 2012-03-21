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

use Fightmaster\Model\Manager\DoctrineManager;
use Doctrine\ORM\EntityManager;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationManager extends DoctrineManager
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager, $class)
    {
        parent::__construct($entityManager, $class);
        $this->entityManager = $entityManager;
    }

    /**
     * @param $competition
     * @return Application[]
     */
    public function findByCompetition($competition)
    {
        return $this->findBy(array('competition' => $competition));
    }
}
