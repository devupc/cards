<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CategoryType
 *
 * @author javier olivares
 */
class GroupCategoryType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', null, array(
                    'label' => 'nombre',                    
                ))
                ->add('slug', null, array(
                    'label' => 'Slug',                    
                ))
                ->add('status', 'choice', array(
                    'label' => 'Estado',
                    'empty_value' => '---SELECCIONE---',
                    'choices' => \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS
                ))
                ->add('description', null, array(
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
        return 'group_category';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\GroupCategory',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'task_item',
        ));
    }
}