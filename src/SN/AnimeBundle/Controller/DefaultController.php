<?php

namespace SN\AnimeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('SNAnimeBundle:Default:index.html.twig', array('name' => $name));
    }
}
