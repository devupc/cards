<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\Category;
use Symfony\Component\HttpFoundation\Request;

/**
 * Description of CategoriaCrudController
 *
 * @author javier olivares
 */
class CategoryCrudController extends Controller {
    
    /**
     * @Route("/", name="admin_categorias_list")
     * @Template("")
     */
    public function listAction(Request $request) {
        $form = $this->createForm('category_search', null);
        $form->handleRequest($request);
        $criteria = $form->getData() ? $form->getData() : array();
        foreach ($criteria as $key => $value) {
            if (!$value) {
                unset($criteria[$key]);
            }
        }
        $em = $this->getDoctrine()
                ->getRepository('CardsBundle:Category');
        $query = $em->findBy($criteria);
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 15/* limit per page */
        );
        return array(
            'pagination' => $pagination,
            'form' => $form->createView()
        );
    }
    
     /**
     * @Route("/add", name="admin_categorias_add")
     * @Template("")
     */
    public function newAction(Request $request) {
        $object = new Category();
        $object->setCreatedAt( new \DateTime("now"));
        $form = $this->createForm('category', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'categoria',
            'Registro grabado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_categorias_add' : 'admin_categorias_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
    /**
     * @Route("/{pk}", name="admin_categorias_edit")
     * @Template("")
     */
    public function editAction(Request $request, $pk) {
        $object = $this->getDoctrine()->getRepository('CardsBundle:Category')->find($pk);
        $form = $this->createForm('category', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {            
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
            'categoria',
            'Registro modificado satisfactoriamente'
            );
            $nextAction = $form->get('saveAndAdd')->isClicked() ? 'admin_categorias_add' : 'admin_categorias_list';
            return $this->redirect($this->generateUrl($nextAction));
        }
        return array(
            'form' => $form->createView()
        );
    }
}

?>
