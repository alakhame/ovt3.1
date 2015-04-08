<?php

namespace OVT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class UserInfosController extends Controller
{
    public function getUserNameAction()
    {
        return   new Response($this->container->get('security.context')->getToken()->getUser()->getUsername()) ;
    }
}
