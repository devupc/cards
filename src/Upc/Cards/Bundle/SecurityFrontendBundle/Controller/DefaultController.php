<?php

namespace Upc\Cards\Bundle\SecurityFrontendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SecurityFrontendBundle:Default:index.html.twig', array('name' => $name));
    }
}
