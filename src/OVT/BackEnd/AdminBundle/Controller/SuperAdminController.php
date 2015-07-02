<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use OVT\UserBundle\Entity\User ;
use Symfony\Component\HttpFoundation\Request;

class SuperAdminController extends Controller
{
    public function indexAction()
    { 
        return $this->redirect($this->generateUrl('ovt_back_end_admin_profile'));
    }

    public function gestionAction($gestion){
        if($gestion=="adminClient"){
           $gestion="client";
        }
	    else if($gestion=="adminProvider"){
           $gestion="provider";
        }
    	return $this->render('OVTBackEndAdminBundle:Gestion:'.$gestion.'.html.twig'); 
    }

    public function addNewAction($gestion, Request $request){
        $error=$request->get('error');
        if($gestion=="adminClient" || $gestion=="adminProvider"){
           $type=$gestion;
           $gestion="user";
        }
	    if(isset($error) && $error!=""){ 
            return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig',array('error'=>$error));
        } 
        if(isset($type)) 
            return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig',array('type'=>$type));
        return $this->render('OVTBackEndAdminBundle:'.$gestion.':addNew.html.twig');
    }
}
