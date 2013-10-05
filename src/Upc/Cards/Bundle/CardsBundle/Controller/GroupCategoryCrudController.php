<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\GroupCategory;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of CategoriaCrudController
 *
 * @author javier olivares
 */
class GroupCategoryCrudController extends Controller {
    
    
    
    /**
     * @Route("/", name="admin_gcategorias_list")
     * @Template("")
     */
    public function listAction(Request $request) {
        $form = $this->createForm('gcategory_search', null);
        $form->handleRequest($request);
        $criteria = $form->getData() ? $form->getData() : array();
        foreach ($criteria as $key => $value) {
            if (!$value) {
                unset($criteria[$key]);
            }
        }
        $em = $this->getDoctrine()
                ->getRepository('CardsBundle:GroupCategory');
        $query = $em->findBy($criteria);
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
     * @Route("/add", name="admin_gcategorias_add")
     * @Template("")
     */
    public function newAction(Request $request) {
        $object = new GroupCategory();
        $object->setCreatedAt( new \DateTime("now"));
        $form = $this->createForm('group_category', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'gcategoria',
            'Registro grabado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_gcategorias_add' : 'admin_gcategorias_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
    /**
     * @Route("/{pk}", name="admin_gcategorias_edit")
     * @Template("")
     */
    public function editAction(Request $request, $pk) {
        $object = $this->getDoctrine()->getRepository('CardsBundle:GroupCategory')->find($pk);
        $form = $this->createForm('group_category', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'gcategoria',
            'Registro modificado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_gcategorias_add' : 'admin_gcategorias_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
}

?>
