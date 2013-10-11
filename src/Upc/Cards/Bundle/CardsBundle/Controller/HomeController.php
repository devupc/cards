<?php

namespace Upc\Cards\Bundle\CardsBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Upc\Cards\Bundle\CardsBundle\Entity\Contact;

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

        //$form = $this->createForm('contact');
        return array(
            'groupCategories' => $groupCategories,
            'carousel' => true,
            'cardsCategories' => $array_cards_categories,
                //'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/novedades", name="cards_homepage_novedades")
     * @Template()
     */
    public function novedadesAction(Request $request) {

        $em = $this->getDoctrine()->getEntityManager();

        $cards = $em->getRepository('CardsBundle:Card')->findBy(array(), array(
            'createdAt' => 'DESC'
        ), 9);
        
        return array(
            'cards' => $cards,
            'carousel' => false,
            'groupCategories' => array()
        );
    }

    /**
     * @Route("/contact/add", name="cards_conctact_add")
     * @Template("")
     */
    public function addContactAction(Request $request) {
        $object = new Contact();
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($object);
        $object->setCreatedAt(new \DateTime("now"));
        $form = $this->createForm('contact', $object);
//        print_r($request);
//        echo $request;
        $form->handleRequest($request);

        $password = $encoder->encodePassword($object->getPassword(), $object->getEmail());
        $object->setPassword($password);
//        if($form->isValid()){
        $em = $this->getDoctrine()->getManager();
        $em->persist($object);
        $em->flush();
        $this->get('session')->getFlashBag()->add(
                'contact', 'Su registro fue satisfactorio'
        );
        return $this->redirect($this->generateUrl('cards_homepage_home'));
//        }else{
//            $this->get('session')->getFlashBag()->add(
//            'contact',
//            $form->getErrorsAsString()
//            );
//            return $this->redirect($this->generateUrl('cards_homepage_home'));
//        }
    }

   
    /**
     * @Route("/contact/login", name="cards_conctact_login")
     * @Template("")
     */
    public function loginContactAction(Request $request) {
        if (!$this->get('session')->get('contact')) {
            $object = new Contact();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($object);

            $email = $request->get('username');
            $_password = $request->get('password');
            echo $email;
            echo $_password;
                    
            $password = $encoder->encodePassword($_password, $email);
            
            $em = $this->getDoctrine()->getManager()->getRepository('CardsBundle:Contact');
            $contact = $em->findOneBy(array(
                'email' => $email,
                'password' => $password
            ));
//            echo $contact->getFirstName();
            //echo $contact;
            if (null !== $contact) {
                $this->get('session')->getFlashBag()->add(
                        'contact', 'Bienevenido ' . $contact->getFirstName() . ' ' . $contact->getLastName()
                );
                $this->get('session')->set('contact', $contact);
                return $this->redirect($this->generateUrl('cards_homepage_home'));
            } else {
                $this->get('session')->getFlashBag()->add(
                        'contact', "El usuario  o contraseña son incorrectos"
                );
                return $this->redirect($this->generateUrl('cards_homepage_home'));
            }
        } else {
            return $this->redirect($this->generateUrl('cards_homepage_home'));
        }
    }
    
    /**
     * @Route("/contact/logout", name="cards_conctact_logout")
     * @Template("")
     */
    public function logoutContactAction(Request $request) {
        if ($this->get('session')->get('contact')) {
            $this->get('session')->remove('contact');
        }
        return $this->redirect($this->generateUrl('cards_homepage_home'));
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
