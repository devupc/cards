<?php

namespace Upc\Cards\Bundle\SecurityBackendBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SecurityBackendBundle:Default:index.html.twig', array('name' => $name));
    }
}
