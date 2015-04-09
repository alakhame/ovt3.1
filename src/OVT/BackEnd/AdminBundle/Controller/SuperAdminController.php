<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SuperAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTBackEndAdminBundle:SuperAdmin:profil.html.twig');
    }

    public function gestionAction($gestion){
	  
    	return $this->render('OVTBackEndAdminBundle:Gestion:'.$gestion.'.html.twig');
        
    }

    public function addNewAction($gestion){
	 
        return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig');
    }
}
