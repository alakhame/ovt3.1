<?php

namespace OVT\Services\LFSBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTServicesLFSBundle:Default:index.html.twig', array('name' => $name));
    }
}
