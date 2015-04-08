<?php

namespace OVT\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTGeneralBundle:Default:index.html.twig', array('name' => $name));
    }
}
