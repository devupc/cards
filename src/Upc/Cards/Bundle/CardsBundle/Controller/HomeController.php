<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();
        
        
//        echo "<pre>";
//        
//        print_r($groupCategories);
//        echo "</pre>";
//        die();

        return $this->render('CardsBundle:Home:index.html.twig', array('groupCategories' => $groupCategories));
    }

}
