<?php

namespace Upc\Cards\Bundle\CardsBundle\Form;

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
            ->add('tipopostal')
            ->add('titulo')
            ->add('descripcion')
            ->add('etiquetabusqueda')
            ->add('rutatarjeta')
            ->add('rutaminiatura')
            ->add('genero')
            ->add('invitadodisponible')
            ->add('fecharegistro')
            ->add('estado')
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
