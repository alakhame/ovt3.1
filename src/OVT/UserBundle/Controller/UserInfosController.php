<?php

namespace OVT\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
 use Symfony\Component\HttpFoundation\Request;


class UserInfosController extends Controller
{
    public function getUserNameAction()
    {
        return   new Response($this->getUser()->getUsername()) ;
    }

    public function updateProfileAction(Request $req)
    {
        $superAdmin=$this->get('superadmin');
        $user=$superAdmin->getUserById($req->request->get('userId'));
        
        $user->setFirstname($req->request->get('firstName'));
        $user->setLastname($req->request->get('lastName'));
        $user->setPhoneNumber($req->request->get('phoneNumber'));
        $user->setAddress($req->request->get('address'));
        $superAdmin->update();
        
        $referer = $req->headers->get('referer');

        return $this->redirect($referer);
    }

    public function profileViewAction($user)
    {
       return $this->render('OVTUserBundle:Default:profile.html.twig',array('user'=>$user));
    }
    public function profilRedirectionAction()
    {
    	$superAdmin=$this->get('superadmin');
        $user=$this->getUser();
       	$org=$superAdmin->getOrganisationById($user->getOrganisation());
        $hashLink=$org->getHashLink();
        $roles=$user->getRoles();
        

        if(in_array('ROLE_SUPER_ADMIN', $roles)){
        	return $this->redirect($this->generateUrl('ovt_back_end_admin_homepage'));
        		
        }
        else if(in_array('ROLE_ACCOUNTING', $roles)){
        	return $this->redirect($this->generateUrl('ovt_back_end_accounting_homepage'));
        		
        }
		else if(in_array('ROLE_PROVIDER_ADMIN', $roles)){
			return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_homepage'));
        		
		}
		else if(in_array('ROLE_WORKER', $roles)){
			return $this->redirect($this->generateUrl('ovt_front_end_provider_homepage'));
        		
		}
		else if(in_array('ROLE_COM_ADMIN', $roles)){
			return $this->redirect($this->generateUrl('ovt_front_end_admin_client_homepage'));
        		
		}
		else if(in_array('ROLE_CLIENT', $roles)){
			return $this->redirect($this->generateUrl('ovt_front_end_client_homepage'));
		}

 		return new Response("ROLE ERROR : Contact Administrator");
	        		 

    }

    public function getUser(){
    	return $this->container->get('security.context')->getToken()->getUser();
    }
}
