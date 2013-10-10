<?php

namespace Upc\Cards\Bundle\CardsBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContactType extends AbstractType {

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('firstName', null, array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Nombres'
                    )
                ))
                ->add('lastName', null, array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Apellidos')
                ))
                ->add('email', 'email', array(
                    'required' => true,
                    'attr' => array(
                        'placeholder' => 'Email')
                ))
                ->add('gender', 'choice', array(
                    'required' => false,
                    'choices' => array(
                        1 => 'Masculino',
                        2 => 'Femenino',
                        3 => 'Otro'
                    ),
                    'empty_value' => '---Seleccione---',
                    'attr' => array(
                        'placeholder' => 'Genero')
                ))
//                ->add('birthday', 'text', array(
//                    'required' => false,
//                    'attr' => array(
//                        'placeholder' => 'Cumpleaños',
//                        'type' => 'date'
//            )))
                ->add('sourceType', 'choice', array(
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Origen',),
                    'choices' => array(
                        1 => 'Internet',
                        2 => 'Redes Sociales',
                        3 => 'Otro'
                    ),
                    'empty_value' => '---Seleccione---'
                ))
                ->add('relationType', 'choice', array(
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Tipo'),
                    'choices' => array(
                            1 => 'Señor',
                            2 => 'Señora',
                            3 => 'Señorita'
                        ),
                    'empty_value' => '---Seleccione---'
                ))
//                ->add('date_anniversary', 'text', array(
//                    'required' => false,
//                    'attr' => array(
//                        'placeholder' => 'Aniversario'
//            )))
                ->add('cellphone', null, array(
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Celular')
                ))
                ->add('phone', null, array(
                    'required' => false,
                    'attr' => array(
                        'placeholder' => 'Telefono')
                ))
//                ->add('status', null, array(
//                    'required' => false,
//                    'attr' => array(
//                        'placeholder' => 'Estado'
//            )))
                ->add('save', 'submit', array(
                    'label' => 'Registrar',
                    'attr' => array('class' => 'btn btn-primary'),));
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => 'Upc\Cards\Bundle\CardsBundle\Entity\Contact',
            'csrf_protection' => false,
        ));
    }

    /**
     * @return string
     */
    public function getName() {
        return 'contact';
    }

}
