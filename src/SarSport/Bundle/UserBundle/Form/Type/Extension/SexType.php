<?php
/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */

namespace SarSport\Bundle\UserBundle\Form\Type\Extension;

use Symfony\Component\Form\AbstractType;
/**
 * @author Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 */
class SexType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function getParent(array $options)
    {
        return 'choice';
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        return array('choices'=> array(1=>'fos_user_registration_form_sex_man', 2=>'fos_user_registration_form_sex_woman'));
    }

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'sex';
    }

}
