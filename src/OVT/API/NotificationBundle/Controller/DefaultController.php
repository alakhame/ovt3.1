<?php

namespace OVT\API\NotificationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('OVTAPINotificationBundle:Default:index.html.twig', array('name' => $name));
    }
}
