<?php

namespace OVT\Services\PostSyncBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTServicesPostSyncBundle:Default:index.html.twig', array('name' => $name));
    }
}
