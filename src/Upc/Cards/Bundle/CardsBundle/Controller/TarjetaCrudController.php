<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta;
use Upc\Cards\Bundle\CardsBundle\Form\TarjetaType;

/**
 * Tarjeta controller.
 * 
 */
class TarjetaCrudController extends Controller
{

    /**
     * Lists all Tarjeta entities.
     *
     * @Route("/", name="admin_tarjetas")
     * @Method("GET")
     * @Template("CardsBundle:CrudTarjeta:index.html.twig")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('CardsBundle:Tarjeta')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Tarjeta entity.
     *
     * @Route("/", name="admin_tarjetas_create")
     * @Method("POST")
     * @Template("CardsBundle:CrudTarjeta:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Tarjeta();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tarjetas_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a Tarjeta entity.
    *
    * @param Tarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Tarjeta $entity)
    {
        $form = $this->createForm(new TarjetaType(), $entity, array(
            'action' => $this->generateUrl('admin_tarjetas_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Tarjeta entity.
     *
     * @Route("/new", name="admin_tarjetas_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Tarjeta();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Tarjeta entity.
     *
     * @Route("/{id}", name="admin_tarjetas_show")
     * @Method("GET")
     * @Template("CardsBundle:CrudTarjeta:show.html.twig")
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CardsBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Tarjeta entity.
     *
     * @Route("/{id}/edit", name="admin_tarjetas_edit")
     * @Method("GET")
     * @Template("CardsBundle:CrudTarjeta:edit.html.twig")
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CardsBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a Tarjeta entity.
    *
    * @param Tarjeta $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Tarjeta $entity)
    {
        $form = $this->createForm(new TarjetaType(), $entity, array(
            'action' => $this->generateUrl('admin_tarjetas_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Tarjeta entity.
     *
     * @Route("/{id}", name="admin_tarjetas_update")
     * @Method("PUT")
     * @Template("CardsBundle:CrudTarjeta:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('CardsBundle:Tarjeta')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Tarjeta entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_tarjetas_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Tarjeta entity.
     *
     * @Route("/{id}", name="admin_tarjetas_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('CardsBundle:Tarjeta')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Tarjeta entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_tarjetas'));
    }

    /**
     * Creates a form to delete a Tarjeta entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_tarjetas_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
