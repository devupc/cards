<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\Category;

/**
 * Category controller.
 *
 */
class CategoryController extends Controller {

    /**
     * @Route("/{slug}", name="category_cards")
     * @Template("")
     */
    public function listCardsAction(Request $request, $slug) {

        $em = $this->getDoctrine()->getEntityManager();
        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();



        $cardsCategories = $em->getRepository('CardsBundle:CardCategoryUser')->getCardByUserId($slug);

        $array_cards_categories = array();
        foreach ($cardsCategories as $cardCategory) {
            $array_cards_categories[$cardCategory->getCategory()->getId()]['name'] = $cardCategory->getCategory()->getName();
            $array_cards_categories[$cardCategory->getCategory()->getId()]['cards'][] = array('id' => $cardCategory->getCard()->getId(), 'name' => $cardCategory->getCard()->getTitle(), 'filename' => $cardCategory->getCard()->getAbsolutePath());
        }

        return array('groupCategories' => $groupCategories, 'carousel'=>false,'cardsCategories' => $array_cards_categories);
    }

    /**
     * Lists all Category entities.
     *
     * @Route("/", name="category")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CardsBundle:Category')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a Category entity.
     *
     * @Route("/{id}", name="category_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CardsBundle:Category')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Category entity.');
        }

        return array(
            'entity' => $entity,
        );
    }

}
