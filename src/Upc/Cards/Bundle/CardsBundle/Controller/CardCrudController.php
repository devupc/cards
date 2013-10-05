<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\Card;
use Upc\Cards\Bundle\CardsBundle\Entity\CardCategoryUser;

/**
 * Tarjeta controller.
 * 
 */
class CardCrudController extends Controller
{

    /**
     * @Route("/", name="admin_tarjetas_list")
     * @Template("")
     */
    public function listAction(Request $request) {
        $form = $this->createForm('card_search', null);
        $form->handleRequest($request);
        $criteria = $form->getData() ? $form->getData() : array();
        foreach ($criteria as $key => $value) {
            if (!$value) {
                unset($criteria[$key]);
            }
        }
        $em = $this->getDoctrine()
                ->getRepository('CardsBundle:Card');
        $query = $em->findUsingLike($criteria);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 5/* limit per page */
        );
        return array(
            'pagination' => $pagination,
            'form' => $form->createView()
        );
    }
    
     /**
     * @Route("/add", name="admin_tarjetas_add")
     * @Template("")
     */
    public function newAction(Request $request) {
        $object = new Card();
        $object->setCreatedAt( new \DateTime("now"));
        $form = $this->createForm('card', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $object->setRootDir( str_replace('/cards/app', $this->getRequest()->getBasePath(),  $this->get('kernel')->getRootDir()).'/' );
            $em->persist($object);
            $em->flush();
            foreach ($object->getCategories() as $category) {
                $catcard = new CardCategoryUser();
                $catcard->setCard($object)
                        ->setCategory($category)
                        ->setStatus($object->getStatus())
                        ->setCreatedAt($object->getCreatedAt());
                $em->persist($catcard);
                $em->flush();
            }
            $this->get('session')->getFlashBag()->add(
            'card',
            'Registro grabado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_cards_add' : 'admin_tarjetas_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
    /**
     * @Route("/{pk}", name="admin_tarjetas_edit")
     * @Template("")
     */
    public function editAction(Request $request, $pk) {
        $object = $this->getDoctrine()->getRepository('CardsBundle:Card')->find($pk);
        $form = $this->createForm('card', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'card',
            'Registro modificado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_cards_add' : 'admin_tarjetas_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
}
