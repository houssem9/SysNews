<?php
namespace SN\SysNewsBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;

class CommentEditType extends AbstractType

{

  public function buildForm(FormBuilderInterface $builder, array $options)

  {

    

  }

  public function getName()

  {

    return 'sn_sysnewsbundle_comment_edit';

  }

  public function getParent()

  {

    return new CommentType();

  }

}
