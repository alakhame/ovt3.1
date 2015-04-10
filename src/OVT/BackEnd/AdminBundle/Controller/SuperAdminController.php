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
	    if($gestion=='user'){
            $user = new User();
            $user->setEnabled(true);
            $formFactory = $this->get('fos_user.registration.form.factory');
            $form = $formFactory->createForm();
            $form->setData($user);
            $form->handleRequest($request);

            return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig',array('form'=>$form->createView()));
        }
        return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig');
    }
}
