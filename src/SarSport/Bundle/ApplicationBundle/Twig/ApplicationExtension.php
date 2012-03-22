<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Twig;

use Twig_Extension;
use Twig_Function_Method;
use Symfony\Component\Security\Core\SecurityContextInterface;
use SarSport\Bundle\ApplicationBundle\Entity\Application;
use SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface;
use SarSport\Bundle\ApplicationBundle\Model\SignedApplicationInterface;
use SarSport\Bundle\UserBundle\Entity\User;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationExtension extends Twig_Extension
{

    /**
     * @var SecurityContext
     */
    protected $securityContext;

    /**
     * Constructor.
     *
     * @param SecurityContextInterface $securityContext
     */
    public function __construct(SecurityContextInterface $securityContext)
    {
        $this->securityContext = $securityContext;
    }

    public function isOwner(ApplicationInterface $application)
    {
        if ($this->securityContext->getToken()->getUser() instanceof User) {
            if ($this->securityContext->isGranted(array('ROLE_ADMIN'))) {
                return true;
            } elseif ($application instanceof SignedApplicationInterface) {
                if ($this->securityContext->getToken()->getUser()->getId() == $application->getUser()->getId()) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Returns competition name
     *
     * @param $competition
     * @return string
     */
    public function getCompetitionName($competition)
    {
        switch ($competition) {
            case Application::RACE_MULTIGONKA_SLUG:
                return Application::RACE_MULTIGONKA_NAME;
                break;
            case Application::RACE_VELOGONKA_SLUG:
                return Application::RACE_VELOGONKA_NAME;
                break;
            default:
                return '';
            break;
        }
    }

    /**
     * Returns class name
     *
     * @param $competition
     * @return string
     */
    public function getClassName($class)
    {
        switch ($class) {
            case Application::APPLICATION_CLASS_SPORT_VALUE:
                return Application::APPLICATION_CLASS_SPORT_NAME;
                break;
            case Application::APPLICATION_CLASS_TOURISM_VALUE:
                return Application::APPLICATION_CLASS_TOURISM_NAME;
                break;
            default:
                return '';
                break;
        }
    }

    /**
     * Returns class name
     *
     * @param $competition
     * @return string
     */
    public function getGroupName($group)
    {
        switch ($group) {
            case Application::APPLICATION_GROUP_M_VALUE:
                return Application::APPLICATION_GROUP_M_NAME;
                break;
            case Application::APPLICATION_GROUP_MR_VALUE:
                return Application::APPLICATION_GROUP_MR_NAME;
                break;
            case Application::APPLICATION_GROUP_MW_VALUE:
                return Application::APPLICATION_GROUP_MW_NAME;
                break;
            case Application::APPLICATION_GROUP_MWR_VALUE:
                return Application::APPLICATION_GROUP_MWR_NAME;
                break;
            default:
                return '';
                break;
        }
    }

    /**
     * Returns class name
     *
     * @param $competition
     * @return string
     */
    public function getBoolean($group)
    {
        switch ($group) {
            case 1:
                return 'application.yes';
                break;
            default:
            case 0:
                return 'application.no';
                break;
        }
    }

    /**
     * {@inheritDoc}
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'sarsport_application_get_competition_name' => new Twig_Function_Method($this, 'getCompetitionName'),
            'sarsport_application_get_class_name' => new Twig_Function_Method($this, 'getClassName'),
            'sarsport_application_get_group_name' => new Twig_Function_Method($this, 'getGroupName'),
            'sarsport_application_get_boolean' => new Twig_Function_Method($this, 'getBoolean'),
            'sarsport_application_is_owner' => new Twig_Function_Method($this, 'isOwner'),
        );
    }

    /**
     * {@inheritDoc}
     *
     * @return string
     */
    public function getName()
    {
        return 'sarsport_application';
    }
}
