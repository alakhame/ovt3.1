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
	    switch ($gestion) {
	    	case 'utilisateur':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:user.html.twig');
	    		break;
	    	case 'client':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:client.html.twig');
	    		break;
	    	case 'presta':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:provider.html.twig');
	    		break;
	    	case 'service':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:service.html.twig');
	    		break;

	    }
    
        
    }

    public function addNewAction($gestion){
	    switch ($gestion) {
	    	case 'utilisateur':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:user.html.twig');
	    		break;
	    	case 'client':
	    		return $this->render('OVTBackEndAdminBundle:Client:addNew.html.twig');
	    		break;
	    	case 'presta':
	    		return $this->render('OVTBackEndAdminBundle:Gestion:provider.html.twig');
	    		break;
	    	case 'service':
	    		return $this->render('OVTBackEndAdminBundle:Service:addNew.html.twig');
	    		break;

	    }
    
        
    }
}
