<?php

namespace OVT\FrontEnd\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class FrontClientController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTFrontEndClientBundle:Client:profil.twig.html');
    }

     public function testAction()
    {
        return $this->render('OVTFrontEndClientBundle:Client:test.html.twig');
    }
}
