<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */


namespace SarSport\Bundle\ApplicationBundle\Exception;

/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class ApplicationException extends \Exception implements Exception
{
    /**
     * @static
     * @return ApplicationException
     */
    public static function savingAbortedByPrePersistEvent()
    {
        return new self('Saving of the application was aborted by the pre-persist event');
    }

    /**
     * @static
     * @return ApplicationException
     */
    public static function removingAbortedByPreRemovingEvent()
{
    return new self('Removing of the application was aborted by the pre-remove event');
}
}
