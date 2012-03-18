<?php

namespace SarSport\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('SarSportApplicationBundle:Default:index.html.twig', array('name' => $name));
    }
}
