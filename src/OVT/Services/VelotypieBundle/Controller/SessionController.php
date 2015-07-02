<?php

namespace OVT\Services\VelotypieBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


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

    public function authAction(Request $request){
        $apiHelper = $this->get('apiHelper');
        $hash=$request->get('hash');
        $type=$request->get('type');
        $user = $apiHelper->getUserById($request->get('uID'));
        $session=$apiHelper->getSessionByLink($hash);
       // return new Response(var_dump($user));
        if($type=="worker"){
            $agent=$session->getWorker()->getUser();
        }else if($type=="client"){
            $agent=$session->getClient()->getUser();
        }else {
            $agent="none";
        }
        if ($agent==$user) {
            return new Response( '{"access":"granted"}' );
        }else {
            return new Response(  '{"access":"denied"}' );
        }
    }
}
