<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class CardType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('title', null, array())
                ->add('description', null, array())
                ->add('postalType', null, array())
                ->add('keywords', null, array())
                
                ->add('availableGuest', null, array())
                ->add('gender', null, array())
                ->add('status', 'choice', array(
                    'label' => 'Estado',
                    'choices' => \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS,
                    'empty_value' => '---SELECCIONE---'
                ))
                ->add('save', 'submit', array(
                    'label' => 'Guardar',
                    'attr' => array('class' => 'btn btn-primary'),))
                ->add('saveAndAdd', 'submit', array(
                    'label' => 'Guardar y Añadir Otro',
                    'attr' => array('class' => 'btn btn-primary')));
        
        $builder->addEventListener(
                FormEvents::PRE_SET_DATA, function(FormEvent $event) {
                    $form = $event->getForm();
                    $card = $event->getData();
                    if(null === $card->getWebPath()){
                        $form->add('file', 'file', array());
                    }else{
                        $form->add('file', 'file', array(
                            'required' => false
                        ));
                    }
                }
        );
        
        $builder->addEventListener(
                FormEvents::PRE_BIND, function(FormEvent $event) {
                    $form = $event->getForm();
                    $card = $event->getData();
                    if(null === $card | is_array($card) ){
                        return;
                    }
                    if(null === $card->getWebPath()){
                        $form->add('file', 'file', array());
                    }else{
                        $form->add('file', 'file', array(
                            'required' => false
                        ));
                    }
                    
                }
        );
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\Card'
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'card';
    }

}
