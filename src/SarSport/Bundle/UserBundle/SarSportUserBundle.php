<?php

namespace SarSport\Bundle\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class SarSportUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
