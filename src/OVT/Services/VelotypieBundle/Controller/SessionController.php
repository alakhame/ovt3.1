<?php

namespace OVT\Services\VelotypieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SessionController extends Controller
{
    public function joinAction($userType, $hashLink)
    {	
    	$adminProvider=$this->get('superadmin');
    	$session=$adminProvider->getSessionByLink($hashLink);
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	$dataArray=array('user'=>$user,'session'=>$session,'link'=>$hashLink);
    	if($userType=="client"){
			return $this->render('OVTServicesVelotypieBundle:Session:clientJoin.html.twig', $dataArray);
    	}
    	else if($userType=="worker"){
    		return $this->render('OVTServicesVelotypieBundle:Session:workerJoin.html.twig', $dataArray);
    	}
        
    }
}
