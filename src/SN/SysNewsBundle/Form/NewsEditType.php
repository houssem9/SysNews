<?php

namespace SN\SysNewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class NewsEditType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    
    $builder->remove('date');
  
  } 


  public function getName()
  {
    return 'sn_sysnewsbundle_news_edit';
  }

  public function getParent()
  {
    return new NewsType();
  }
}