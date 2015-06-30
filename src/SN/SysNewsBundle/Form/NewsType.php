<?php


namespace SN\SysNewsBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class NewsType extends AbstractType

{
    
/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            ->add('titre', 'text')
            ->add('contenu', 'textarea')
            ->add('dateajout', 'date')
            
            ->add('image',      new ImageType())
  ->add('save',      'submit')        ;
 }  
   
    
/**
     * @param OptionsResolverInterface $resolver
     */
    
public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SN\SysNewsBundle\Entity\News'
        ));
    }

    
/**
     * @return string
     */
    
public function getName()
    {
        return 'sn_sysnewsbundle_news';
    }

}
