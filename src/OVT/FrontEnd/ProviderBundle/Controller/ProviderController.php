<?php

namespace OVT\FrontEnd\ProviderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class ProviderController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTFrontEndProviderBundle:Provider:index.html.twig');
    }

  

    public function archivesViewAction()
    {
        return $this->render('OVTFrontEndProviderBundle:Provider:archives.html.twig');
    }

    public function calendarViewAction()
    {
        return $this->render('OVTFrontEndProviderBundle:Provider:agenda.html.twig');
    }

    public function mySessionsAction()
    {	
    	$adminProvider=$this->get('provideradmin');
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	$sessions=$adminProvider->retrieveSessionsByState($user);
        return $this->render('OVTFrontEndProviderBundle:Provider:sessions.html.twig', array('sessions' => $sessions ));
    }

    public function getSessionsByStateAction($state){
        $adminProvider=$this->get('provideradmin');
        $user=  $this->container->get('security.context')->getToken()->getUser();
        $sessions=$adminProvider->getSessionsByWorkerByState($user,$state); 
        //return new Response(count($sessions));
        return $this->render('OVTFrontEndProviderBundle:Provider:sessionsTable.html.twig', array('sessions' =>$sessions ));
    }

    public function retrieveAffectedSessionsAction(){
        $adminProvider=$this->get('provideradmin');
        $user=  $this->container->get('security.context')->getToken()->getUser();
        $sessions=$adminProvider->getSessionsByWorker($user); 
        
        return $this->render('OVTFrontEndProviderBundle:Provider:sessions.json.twig', array('sessions' =>$sessions ));
    }



    public function testAction (){ 
        return $this->getSessionsByStateAction('TO_CONFIRM');
    }

    public function JSONFeedAction(){
        return $this->render('OVTFrontEndProviderBundle:Provider:feedTest.json.twig');
    }
}
