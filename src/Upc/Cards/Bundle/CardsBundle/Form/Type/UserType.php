<?php

namespace Upc\Cards\Bundle\CardsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UserType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('email')
            ->add('correoalternativo')
            ->add('oauthUid')
            ->add('oauthProvider')
            ->add('algorithm')
            ->add('salt')
            ->add('password')
            ->add('gender')
            ->add('birthday')
            ->add('status')
            ->add('blockedAt')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('ubigeo')
            ->add('permission')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\User'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'upc_cards_bundle_cardsbundle_user';
    }
}
