<?php
/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */

namespace SarSport\Bundle\UserBundle\Entity;

use FOS\UserBundle\Entity\Group as BaseGroup;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class Group extends BaseGroup
{
    /**
     * @var integer $id
     */
    protected $id;

    public function __construct($name, $roles = array())
    {
        parent::__construct($name, $roles);
    }
}