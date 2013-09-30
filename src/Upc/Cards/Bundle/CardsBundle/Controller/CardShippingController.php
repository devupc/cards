<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\CardShipping;

/**
 * CardShipping controller.
 *
 * @Route("/cardshipping")
 */
class CardShippingController extends Controller
{

    /**
     * Lists all CardShipping entities.
     *
     * @Route("/", name="cardshipping")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CardsBundle:CardShipping')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Finds and displays a CardShipping entity.
     *
     * @Route("/{id}", name="cardshipping_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CardsBundle:CardShipping')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CardShipping entity.');
        }

        return array(
            'entity'      => $entity,
        );
    }
}
