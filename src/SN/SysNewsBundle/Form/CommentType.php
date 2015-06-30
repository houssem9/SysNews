<?php


namespace SN\SysNewsBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class CommentType extends AbstractType

{
    
/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contenu','textarea')
            ->add('date', 'datetime')  ->add('valider', 'submit')
                    ;
    }
    
    
/**
     * @param OptionsResolverInterface $resolver
     */
    
public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SN\SysNewsBundle\Entity\Comment'
        ));
    }

    
/**
     * @return string
     */
    
public function getName()
    {
        return 'sn_sysnewsbundle_comment';
    }

}
