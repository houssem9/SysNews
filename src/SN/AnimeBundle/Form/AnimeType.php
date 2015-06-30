<?php


namespace SN\AnimeBundle\Form;


use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class AnimeType extends AbstractType

{
    
/**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    
public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('dateajout', 'date')
            ->add('titre', 'text')
            ->add('auteur', 'text')
            ->add('sortieinitial', 'date', array('widget' => 'text','format' => 'dd-MM-yyyy',))
            ->add('nbEpisodes', 'integer')
            ->add('synopsis', 'textarea')
            ->add('etat', 'checkbox', array('required' => false)) ->add('genres','entity', array( 'class' => 'SNAnimeBundle:Genres', 'property' => 'name', 'multiple' => true, 'expanded' => true)
)          ->add('image', new ImageanimeType())
 ->add('save',      'submit')       ;
    }
    
    
/**
     * @param OptionsResolverInterface $resolver
     */
    
public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'SN\AnimeBundle\Entity\Anime'
        ));
    }

    
/**
     * @return string
     */
    
public function getName()
    {
        return 'sn_animebundle_anime';
    }

}

