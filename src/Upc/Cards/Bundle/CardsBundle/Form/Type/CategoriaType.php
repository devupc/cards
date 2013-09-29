<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CategoriaType
 *
 * @author javier olivares
 */
class CategoriaType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('nombrecategoria', null, array(
                    'label' => 'nombre',                    
                ))
                ->add('ordengrupo', null, array(
                    'label' => 'Orden',
                    'attr' => array(
                        'class' => 'span5 offset7'
                    )
                ))
                ->add('idcategoriagrupo', null, array(
                    'label' => 'Grupo',
                    'empty_value' => '---SELECCIONE---',
                ))
                ->add('estado', 'choice', array(
                    'label' => 'Estado',
                    'empty_value' => '---SELECCIONE---',
                    'choices' => \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS
                ))
                ->add('descripcion', null, array(
                    'label' => 'Descripción',
                    'attr' => array(
                        'style' => 'width:100%;',
                        'rows' => '5'
                    )
                ))
                ->add('save', 'submit', array(
                    'label' => 'Guardar',
                    'attr' => array('class' => 'btn btn-primary'),))
                ->add('saveAndAdd', 'submit', array(
                    'label' => 'Guardar y Añadir Otro',
                    'attr' => array('class' => 'btn btn-primary')));
    }

    public function getName() {
        return 'categoria';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\Categoria',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }
}