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
            'carousel'=>true, 
            'cardsCategories' => $array_cards_categories,
            //'form' => $form->createView()
        );
    }
    
    /**
     * @Route("/contact/add", name="cards_conctact_add")
     * @Template("")
     */
    public function addContactAction(Request $request){
        $object = new Contact();
        $factory = $this->get('security.encoder_factory');
        $encoder = $factory->getEncoder($object);
        $object->setCreatedAt( new \DateTime("now"));
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
        'contact',
        'Su registro fue satisfactorio'
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
     * 
     * @Route("/categories/", name="_categories")
     * @Template("CardsBundle:Home:categories.html.twig")
     */
    public function categoriesAction() {
        return array();
    }

}
