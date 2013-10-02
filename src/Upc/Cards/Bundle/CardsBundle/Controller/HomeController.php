<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('CardsBundle:Home:index.html.twig');
    }
    /**
     * 
     * @Route("/categories/", name="_categories")
     * @Template("CardsBundle:Home:categories.html.twig")
     */
    public function categoriesAction()
    {
        return array();
    }
}
