<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TarjetaType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tipopostal', null, array())
            ->add('titulo', null, array())
            ->add('descripcion', null, array())
            ->add('etiquetabusqueda', null, array())
            ->add('rutatarjeta', 'file', array())
            ->add('rutaminiatura', 'file', array())
            ->add('genero', null, array())
            ->add('invitadodisponible', null, array())            
            ->add('estado', 'choice', array(
                'label' => 'Estado',
                'choices' => \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS,
                'empty_value' => '---SELECCIONE---'
            ))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\Tarjeta'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'upc_cards_bundle_cardsbundle_tarjeta';
    }
}
