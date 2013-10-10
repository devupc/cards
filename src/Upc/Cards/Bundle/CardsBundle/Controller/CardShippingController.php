<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\CardShipping;

/**
 * CardShipping controller.
 *
 */
class CardShippingController extends Controller {

    /**
     * @Route("/confirmarenvio/{id}", name="card_shipping_view")
     * @Template("")
     */
    public function viewAction(Request $request, $id) {

        $em = $this->getDoctrine()->getEntityManager();
        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();

        $dbr_cardShipping = $this->getDoctrine()->getRepository('CardsBundle:CardShipping')->findOneByHashId($id);
        if (!$dbr_cardShipping) {
            throw $this->createNotFoundException('Postal enviada no existe!');
        }

        return array('groupCategories' => $groupCategories, 'carousel' => false, 'cardShipping' => $dbr_cardShipping);
    }

    /**
     * @Route("/{id}", name="card_shipping_register")
     * @Template("")
     */
    public function newAction(Request $request, $id) {

        $em = $this->getDoctrine()->getEntityManager();
        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();

        $dbr_card = $this->getDoctrine()->getRepository('CardsBundle:Card')->find($id);

        if (!$dbr_card) {
            throw $this->createNotFoundException('Postal no existe!');
        }

        $object = new CardShipping();
        $object->setCard($dbr_card);
        $object->setCreatedAt(new \DateTime("now"));
        $object->setShippingAt(new \DateTime("now"));
        $object->setHashId(uniqid());
        $contact = $this->get('session')->get('contact');
        if (null !== $contact) {
            $object->setRemitterName($contact->getFirstName().' '.$contact->getLastName());
            $object->setRemitterEmail($contact->getEmail());
        }
        $form = $this->createForm('card_shipping', $object);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($object);
            $em->flush();
            $this->get('session')->getFlashBag()->add(
                    'cardShipping', 'Su postal ah sido enviada!'
            );

            $url_mailing = $this->generateUrl('card_shipping_review', array('id' => $object->getHashId()));
            $url_action_view = $this->generateUrl('card_shipping_view', array('id' => $object->getHashId()));
            $this->sendPostcard('http://' . $request->getHttpHost() . $url_mailing, $object);

            return $this->redirect($url_action_view);
        }

        return array('groupCategories' => $groupCategories, 'carousel' => false, 'form' => $form->createView(), 'filename' => $dbr_card->getAbsolutePath());
    }

    /**
     * @Route("/revisar/{id}", name="card_shipping_review")
     * @Template("")
     */
    public function postReviewAction(Request $request, $id) {

        $em = $this->getDoctrine()->getEntityManager();
        $groupCategories = $em->getRepository('CardsBundle:GroupCategory')->getCategoriesHome();

        $dbr_cardShipping = $this->getDoctrine()->getRepository('CardsBundle:CardShipping')->findOneByHashId($id);
        if (!$dbr_cardShipping) {
            throw $this->createNotFoundException('Postal no existe!');
        }

        return array('groupCategories' => $groupCategories, 'carousel' => false, 'cardShipping' => $dbr_cardShipping);
    }

    protected function sendPostcard($url_mailing, $cardShipping) {

        $message = \Swift_Message::newInstance()
                ->setSubject('Has Recibido una nueva Postal')
                ->setFrom('devel.web.app@gmail.com')
                ->setTo($cardShipping->getRecipientEmail())
                ->setBody($this->renderView('CardsBundle:CardShipping:postcard.html.twig', array('url_mailing' => $url_mailing, 'card' => $cardShipping)), 'text/html');

        $this->get('mailer')->send($message);
    }

}
