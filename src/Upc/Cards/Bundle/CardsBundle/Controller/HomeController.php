<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('CardsBundle:Home:index.html.twig');
    }
}
