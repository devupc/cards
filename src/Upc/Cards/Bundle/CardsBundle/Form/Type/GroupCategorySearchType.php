<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Description of CategoriaSearchType
 *
 * @author javier olivares
 */
class GroupCategorySearchType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('name', null, array(
                    'label' => 'nombre',
                    'required' => false
                ))
                ->add('status', 'choice', array(
                    'label' => 'Estado',
                    'required' => false,
                    'empty_value' => '---SELECCIONE---',
                    'choices' => \Upc\Cards\Bundle\CardsBundle\CardsBundle::$ESTADOS
                ))
                ->add('search', 'submit', array(
                    'label' => 'Consultar',
                    'attr' => array('class' => 'btn btn-primary')
                ));
    }
    
    public function getName() {
        return 'gcategory_search';
    }
    
     public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'csrf_protection' => false,
            'method' => 'GET',
            'action' => ''
        ));
    }
}

?>
