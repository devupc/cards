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
class CardSearchType extends AbstractType {
    
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('title', null, array(
                    'label' => 'Nombre',
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
        return 'card_search';
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
