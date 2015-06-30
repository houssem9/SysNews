<?php

namespace SN\SysNewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SNSysNewsBundle:Default:index.html.twig', array('name' => $name));
    }
}
