<?php


namespace SN\AnimeBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AnimeEditType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    
  }

  public function getName()
  {
    return 'sn_animebundle_anime_edit';
  }

  public function getParent()
  {
    return new AnimeType();
  }
}
