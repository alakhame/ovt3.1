<?php

namespace OVT\FrontEnd\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\GeneralBundle\Entity\Session ;
use Symfony\Component\Validator\Constraints\DateTime ; 

class ClientController extends Controller
{
    public function indexAction()
    {
    	return $this->redirect($this->generateUrl('ovt_front_end_client_calendar'));
    	if($this->isAdmin())
        	return $this->render('OVTFrontEndClientBundle:ClientAdmin:index.html.twig');
        else
        	return $this->render('OVTFrontEndClientBundle:Client:index.html.twig');
    }

    public function isAdmin()
    {   
        $user= $this->container->get('security.context')->getToken()->getUser();
        if(in_array('ROLE_COM_CLIENT',$user->getRoles()))
            return true;
        else return false;
    }

    public function profileViewAction(){
        $user= $this->container->get('security.context')->getToken()->getUser();
        if($this->isAdmin())
            return $this->render('OVTFrontEndClientBundle:ClientAdmin:profile.html.twig',array('user'=>$user));
        else return $this->render('OVTFrontEndClientBundle:Client:profile.html.twig',array('user'=>$user));
    }
 

    public function documentViewAction(){
        $adminClient=$this->get('clientadmin');
        $user= $this->container->get('security.context')->getToken()->getUser();
        $sessions=$adminClient->getSessionsByClientByState($user,"TERMINATED"); 
        if($this->isAdmin())
            return $this->render('OVTFrontEndClientBundle:ClientAdmin:documents.html.twig',
                array('user'=>$user,'sessions'=>$sessions));
        else 
            return $this->render('OVTFrontEndClientBundle:Client:documents.html.twig',
                array('user'=>$user,'sessions'=>$sessions));
    }

    public function addSessionAction(Request $request ){
       	$adminClient=$this->get('clientadmin');
        $user= $this->container->get('security.context')->getToken()->getUser(); 

        $client = $adminClient->getClientFromUser($user);

        $req= $request->request;
        $title = $req->get('title');
        $desc = $req->get('description');
        $idProvider = $req->get('provider');
        $idService = $req->get('service');
        $type = $req->get('type');
        if($req->get('BK')=="on"){
        	//return new Response(var_dump($req->get('starttimeBK')) );
        	$starttime = $req->get('starttimeBK');
        	$endtime = $req->get('endtimeBK');
        }else{
        	$starttime = $req->get('starttime');
        	$endtime = $req->get('endtime');
        }
        
  		//return new Response( var_dump($starttime)."\n".var_dump(new \DateTime($starttime)));
        
        $session = new Session();
        $session->setTitle($title);
        $session->setService($adminClient->getServiceById($idService));
        $session->setOrganisation($adminClient->getOrganisationById($idProvider));
        $session->setClient($client);
        $session->setDescription($desc);
        $session->setRequestdate(new \DateTime("now"));
        $session->setType($type);
        $session->setState("TO_CONFIRM");
        $session->setStarttime( new \DateTime($starttime)); 
        $session->setEndtime(new \DateTime($endtime) ); 
        $session->setDuration( $session->getStarttime()->diff ($session->getEndtime() ) );
       

        $adminClient->createSession($session);
        return $this->indexAction();
    }

    public function listSessionsAction() {
    	$adminClient=$this->get('clientadmin');
    	$user = $this->container->get('security.context')->getToken()->getUser();
    	$sessions=$adminClient->retrieveSessionsByState($user);
        if(!$this->isAdmin())
           return $this->render('OVTFrontEndClientBundle:Client:sessions.html.twig', array('sessions' => $sessions ));
        else
           return $this->render('OVTFrontEndClientBundle:ClientAdmin:sessions.html.twig', array('sessions' => $sessions ));
    }

    public function getSessionsByStateAction($state){
        $adminClient=$this->get('clientadmin');
        $user=  $this->container->get('security.context')->getToken()->getUser();
        $sessions=$adminClient->getSessionsByClientByState($user,$state);   
        return $this->render('OVTFrontEndClientBundle:Client:sessionsTable.html.twig', array('sessions' =>$sessions ));
    }

    public function calendarViewAction(Request $req, $idClient,$coreCalendar)
    {   
        $adminClient=$this->get('clientadmin');
       
        if($req->get('coreCalendar')!=-1){ 
            
             $client=$adminClient->getClientFromUserID($idClient);
            return $this->render('OVTFrontEndClientBundle:Client:agendaCore.html.twig',
                array('idClient'=>$idClient, 'client'=>$client));
        } else {
            $client=$adminClient->getClientFromUser($this->container->get('security.context')->getToken()->getUser());
            
            if(!$this->isAdmin()){
               return $this->render('OVTFrontEndClientBundle:Client:agenda.html.twig',
                array('idClient'=>$idClient, 'client'=>$client));
            
            }else
                return $this->render('OVTFrontEndClientBundle:ClientAdmin:agenda.html.twig',
                    array('idClient'=>$idClient, 'client'=>$client));
        }
    }

    public function retrieveClientSessionsAction($idClient){
        $adminClient=$this->get('clientadmin');
        $user= $this->container->get('security.context')->getToken()->getUser();
        if($idClient==-1) $sessions=$adminClient->getSessionsByClient($user); 
        else $sessions=$adminClient->getSessionsByClientId($idClient); 
        
        return $this->render('OVTFrontEndClientBundle:Client:sessions.json.twig', array('sessions' =>$sessions ));
    }

    public function retrieveClientSessionsByUserIdAction($idUser){
        $adminClient=$this->get('clientadmin');
        $user= $this->container->get('security.context')->getToken()->getUser();
        if($idUser==-1) $sessions=$adminClient->getSessionsByClient($user); 
        else $sessions=$adminClient->getSessionsByUserId($idUser); 
        
        return $this->render('OVTFrontEndClientBundle:Client:sessions.json.twig', array('sessions' =>$sessions ));
    }

    public function getPDFBySessionIdAction($idSession){
        $adminClient=$this->get('clientadmin'); 
        $session=$adminClient->getSessionById($idSession);
        return new Response(
            $this->get('knp_snappy.pdf')->getOutputFromHtml(
                    $this->renderView("OVTFrontEndClientBundle:Client:document.html.twig", array('session'=>$session ))
                ),
                200,
                array('Content-Type' => 'application/pdf')
            ); 

    }








     public function testAction()
    {
        return $this->render('OVTFrontEndClientBundle:Client:test.html.twig');
    }
}
