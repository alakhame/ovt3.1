<?php

namespace OVT\API\WebRTCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTAPIWebRTCBundle:Default:index.html.twig', array('name' => $name));
    }
}
