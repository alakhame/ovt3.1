<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use OVT\UserBundle\Entity\User ;
use Symfony\Component\HttpFoundation\Request;

class SuperAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTBackEndAdminBundle:SuperAdmin:profil.html.twig');
    }

    public function gestionAction($gestion){
	  
    	return $this->render('OVTBackEndAdminBundle:Gestion:'.$gestion.'.html.twig');
        
    }

    public function addNewAction($gestion, Request $request){
        $error=$request->get('error');
	    if(isset($error) && $error!=""){
            
            return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig',array('error'=>$error));
        }
        return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig');
    }
}
