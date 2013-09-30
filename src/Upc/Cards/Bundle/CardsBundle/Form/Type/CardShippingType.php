<?php

namespace Upc\Cards\Bundle\CardsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CardShippingType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('idusuario')
            ->add('ipAddress')
            ->add('recipientTreatment')
            ->add('recipientName')
            ->add('recipientEmail')
            ->add('remitterName')
            ->add('remitterEmail')
            ->add('message')
            ->add('status')
            ->add('shippingAt')
            ->add('receivedAt')
            ->add('expiredAt')
            ->add('createdAt')
            ->add('card')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\CardShipping'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'upc_cards_bundle_cardsbundle_cardshipping';
    }
}
