<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\Service;
 use Symfony\Component\HttpFoundation\Request;

class ProfileAdminController extends Controller
{   
    

    public function viewAction(){
        $user= $this->container->get('security.context')->getToken()->getUser();
        return $this->render('OVTBackEndAdminBundle:SuperAdmin:profile.html.twig',array('user'=>$user));
    }

}
