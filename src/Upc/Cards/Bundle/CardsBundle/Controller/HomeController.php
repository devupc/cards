<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    public function indexAction() {

        $em = $this->getDoctrine()->getEntityManager();

        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();

        $cardsCategories = $em->getRepository('CardsBundle:CardCategoryUser')->getCardByUserId();        
        
        $array_cards_categories = array();
        foreach ($cardsCategories as $cardCategory) {
            $array_cards_categories[$cardCategory['category']['id']]['name'] = $cardCategory['category']['name'];
            $array_cards_categories[$cardCategory['category']['id']]['cards'][] = array('id' => $cardCategory['card']['id'], 'name' => $cardCategory['card']['title'], 'filename' => $cardCategory['card']['cardPath']);
        }

        return $this->render('CardsBundle:Home:index.html.twig', array('groupCategories' => $groupCategories, 'cardsCategories' => $array_cards_categories));
    }

    /**
     * 
     * @Route("/categories/", name="_categories")
     * @Template("CardsBundle:Home:categories.html.twig")
     */
    public function categoriesAction() {
        return array();
    }

}
