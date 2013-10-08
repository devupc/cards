<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardShippingType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
//        $builder
//                ->add('idusuario')
//                ->add('ipAddress')
//                ->add('recipientTreatment')
//                ->add('recipientName')
//                ->add('recipientEmail')
//                ->add('remitterName')
//                ->add('remitterEmail')
//                ->add('message')
//                ->add('status')
//                ->add('shippingAt')
//                ->add('receivedAt')
//                ->add('expiredAt')
//                ->add('createdAt')
//                ->add('card')
//        ;

        $builder->add('recipientName', null, array(
                    'label' => 'Nombre',
                    'attr' => array('class' => 'span3')
                ))
                ->add('recipientEmail', null, array(
                    'label' => 'Correo',
                    'attr' => array('class' => 'span3', 'type'=>'email')
                ))
                ->add('remitterName', null, array(
                    'label' => 'Nombre',
                    'attr' => array('class' => 'span3')
                ))
                ->add('remitterEmail', null, array(
                    'label' => 'Correo',
                    'attr' => array('class' => 'span3')
                ))
                ->add('message', null, array(
                    'label' => 'Mensaje',
                    'attr' => array(
                        'style' => 'width:100%;',
                        'rows' => '5'
                    )
                ))->add('save', 'submit', array(
                    'label' => 'Enviar',
                    'attr' => array('class' => 'btn btn-primary pull-right'),));


//                $builder->add('recipientName', null, array(
//                    'label' => 'Nombre',                    
//                ));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\CardShipping',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'card_shipping';
    }

}
