<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {

    /**
     * @Route("/", name="cards_homepage_home")
     * @Template()
     */
    public function homeAction(Request $request) {

        $em = $this->getDoctrine()->getEntityManager();

        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();

        $cardsCategories = $em->getRepository('CardsBundle:CardCategoryUser')->getCardByUserId();

        $array_cards_categories = array();
        foreach ($cardsCategories as $cardCategory) {
            $array_cards_categories[$cardCategory->getCategory()->getId()]['name'] = $cardCategory->getCategory()->getName();
            $array_cards_categories[$cardCategory->getCategory()->getId()]['cards'][] = array('id' => $cardCategory->getCard()->getId(), 'name' => $cardCategory->getCard()->getTitle(), 'filename' => $cardCategory->getCard()->getAbsolutePath());
        }

        return array('groupCategories' => $groupCategories,'carousel'=>true, 'cardsCategories' => $array_cards_categories);
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
