<?php

namespace OVT\Services\LFSBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;


class SessionController extends Controller
{
    public function joinAction($userType, $hashLink)
    {	
        $response = new Response();
        $response->headers->set('Access-Control-Allow-Origin', '*');
    	$apiHelper = $this->get('apiHelper');
    	$session=$apiHelper->getSessionByLink($hashLink);
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	$dataArray=array('user'=>$user,'session'=>$session,'link'=>$hashLink); 
    	//return new Response(var_dump($session));
        if($userType=="client"){
			//return $this->render('OVTServicesLFSBundle:Session:clientJoin.html.twig', $dataArray);
            $response->setContent($this->renderView('OVTServicesLFSBundle:Session:clientJoin.html.twig', $dataArray));
            return  $response;
    	}
    	else if($userType=="worker"){
    		//return $this->render('OVTServicesLFSBundle:Session:workerJoin.html.twig', $dataArray);
            $response->setContent($this->renderView('OVTServicesLFSBundle:Session:workerJoin.html.twig', $dataArray));
            return  $response;
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
