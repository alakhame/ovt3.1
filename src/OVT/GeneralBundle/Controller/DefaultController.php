<?php

namespace OVT\GeneralBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function landingPageAction(Request $request)
    {    
         
        return $this->render('OVTGeneralBundle:Default:index.html.twig');
    }
    public function sessionJoinAction(Request $request)
    {	 
    	$uType = $request->get('userType');
    	$service = $request->get('service');
    	$hash = $request->get('hashLink');

    	switch (mb_strtolower($service,'UTF-8')) {
    		case 'vélotypie': 
    			return $this->redirect($this->generateUrl('ovt_services_velotypie_join', 
    				array('userType' =>$uType , 'hashLink'=>$hash )));
    			break;
    		case 'lsf': 
    			return $this->redirect($this->generateUrl('ovt_services_lfs_join', 
    				array('userType' =>$uType , 'hashLink'=>$hash )));
    			break;
    		default:
    			return new Response(mb_strtolower($service,'UTF-8'));
    			break;
    	}

    }
}
