<?php

namespace OVT\Services\VelotypieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    public function joinAction($userType, $hashLink)
    {	
    	$apiHelper = $this->get('apiHelper');
    	$session=$apiHelper->getSessionByLink($hashLink);
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	$dataArray=array('user'=>$user,'session'=>$session,'link'=>$hashLink); 
    	//return new Response(var_dump($session));
        if($userType=="client"){
			return $this->render('OVTServicesVelotypieBundle:Session:clientJoin.html.twig', $dataArray);
    	}
    	else if($userType=="worker"){
    		return $this->render('OVTServicesVelotypieBundle:Session:workerJoin.html.twig', $dataArray);
    	}
        
    }
}
