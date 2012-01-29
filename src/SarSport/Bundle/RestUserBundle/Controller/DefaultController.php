<?php

namespace SarSport\Bundle\RestUserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SarSportRestUserBundle:Default:index.html.twig', array('name' => $name));
    }
}
