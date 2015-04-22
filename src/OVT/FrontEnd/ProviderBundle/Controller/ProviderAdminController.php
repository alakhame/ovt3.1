<?php

namespace OVT\FrontEnd\ProviderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProviderAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:index.html.twig');
    }

     public function setSessionsAction()
    {
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:affectation.html.twig');
    }

    public function getWaitingSessionsAction(){
    	$adminProvider=$this->get('provideradmin');
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	return new Response($adminProvider->getWaitingSessions($user));
    } 

  	public function getSessionsToAffectAction(){
		$adminProvider=$this->get('provideradmin');
		$sessions=$adminProvider->getSessionsToAffect();
		return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:sessionList.html.twig',
				array('sessions'=>$sessions)); 
    }

    public function getCountSessionsToAffectAction(){
		$adminProvider=$this->get('provideradmin');
		return new Response(count($adminProvider->getSessionsToAffect()));
    }

    public function profileViewAction(){
        $user= $this->container->get('security.context')->getToken()->getUser();
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:profile.html.twig',array('user'=>$user));
    }
    
    public function workerAction(){
    	$adminProvider=$this->get('provideradmin');
    	$admin= $this->container->get('security.context')->getToken()->getUser();
    	$workers = $adminProvider->retriveWorkersFromAdmin($admin);
    	return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:workers.html.twig',array('workers'=>$workers));
    }


    public function testAction (){
    	$adminProvider=$this->get('provideradmin');
    	if($adminProvider!=null)
    		return new Response('ok');
    	return new Response('duh');
    }


}
