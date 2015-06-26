<?php

namespace OVT\Services\voiceRecognitionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTServicesvoiceRecognitionBundle:Default:index.html.twig', array('name' => $name));
    }
}
