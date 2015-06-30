<?php
namespace SN\AnimeBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageanimeType extends AbstractType

{
    
/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', 'file')
                   ;
    }
    
    
/**
     * @param OptionsResolverInterface $resolver
     */
    
public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SN\AnimeBundle\Entity\Imageanime'
        ));
    }

    
/**
     * @return string
     */
    
public function getName()
    {
        return 'sn_animebundle_imageanime';
    }

}
