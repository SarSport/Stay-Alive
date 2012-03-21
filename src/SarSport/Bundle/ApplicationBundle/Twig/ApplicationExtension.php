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
use SarSport\Bundle\ApplicationBundle\Entity\Application;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationExtension extends Twig_Extension
{
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
