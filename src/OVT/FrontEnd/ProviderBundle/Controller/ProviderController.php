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

    public function isAdmin()
    {   
        $user= $this->container->get('security.context')->getToken()->getUser();
        if(in_array('ROLE_ADMIN_PROVIDER',$user->getRoles()))
            return true;
        else return false;
    }
    public function profileViewAction(){
        $user= $this->container->get('security.context')->getToken()->getUser();
        if(in_array('ROLE_ADMIN_PROVIDER',$user->getRoles()))
            return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:profile.html.twig',array('user'=>$user));
        else return $this->render('OVTFrontEndProviderBundle:Provider:profile.html.twig',array('user'=>$user));
    }

    public function archivesViewAction()
    {
        return $this->render('OVTFrontEndProviderBundle:Provider:archives.html.twig');
    }

    public function calendarViewAction($idWorker,$coreCalendar)
    {
        //return new Response($idWorker);
        if($coreCalendar!=-1)
            return $this->render('OVTFrontEndProviderBundle:Provider:agendaCore.html.twig',array('idWorker'=>$idWorker));
        else {
            if(!$this->isAdmin()){
               return $this->render('OVTFrontEndProviderBundle:Provider:agenda.html.twig',array('idWorker'=>$idWorker));
            
            }else
                return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:agenda.html.twig',array('idWorker'=>$idWorker));
        }
    }

    public function mySessionsAction()
    {	
    	$adminProvider=$this->get('provideradmin');
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	$sessions=$adminProvider->retrieveSessionsByState($user);
        if(!$this->isAdmin())
           return $this->render('OVTFrontEndProviderBundle:Provider:sessions.html.twig', array('sessions' => $sessions ));
        else
           return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:sessions.html.twig', array('sessions' => $sessions ));
    }

    public function getSessionsByStateAction($state){
        $adminProvider=$this->get('provideradmin');
        $user=  $this->container->get('security.context')->getToken()->getUser();
        $sessions=$adminProvider->getSessionsByWorkerByState($user,$state); 
        //return new Response(count($sessions));
        return $this->render('OVTFrontEndProviderBundle:Provider:sessionsTable.html.twig', array('sessions' =>$sessions ));
    }

    public function retrieveAffectedSessionsAction($idWorker){
        $adminProvider=$this->get('provideradmin');
        $user= $this->container->get('security.context')->getToken()->getUser();
        if($idWorker==-1) $sessions=$adminProvider->getSessionsByWorker($user); 
        else $sessions=$adminProvider->getSessionsByWorkerId($idWorker); 
        
        return $this->render('OVTFrontEndProviderBundle:Provider:sessions.json.twig', array('sessions' =>$sessions ));
    }



    public function testAction (){ 
        return $this->isAdminAction();
    }

    public function JSONFeedAction(){
        return $this->render('OVTFrontEndProviderBundle:Provider:feedTest.json.twig');
    }
}
