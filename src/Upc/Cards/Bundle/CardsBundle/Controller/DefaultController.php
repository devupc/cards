<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CardsBundle:Default:index.html.twig', array('name' => $name));
    }
}
