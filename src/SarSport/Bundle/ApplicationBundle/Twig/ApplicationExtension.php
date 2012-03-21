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
        if ($this->securityContext->getToken() !== null) {
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
     * {@inheritDoc}
     *
     * @return array
     */
    public function getFunctions()
    {
        return array(
            'sarsport_application_get_competition_name' => new Twig_Function_Method($this, 'getCompetitionName'),
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
