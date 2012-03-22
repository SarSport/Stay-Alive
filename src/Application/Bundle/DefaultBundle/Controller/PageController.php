<?php

namespace Application\Bundle\DefaultBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class PageController extends Controller
{
    public function indexAction($slug)
    {
        return $this->render('DefaultBundle:Page:' . $slug . '.html.twig');
    }
}
