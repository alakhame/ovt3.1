<?php

namespace OVT\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\AdminClient;
class DefaultController extends Controller
{
    public function indexAction($id)
    {   
       /* //$user = $this->container->get('security.context')->getToken()->getUser();
        $adminClient=$this->get('clientadmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $clients = $adminClient->retriveClientsFromAdmin($admin);*/
         return $this->render('OVTFrontEndClientBundle:ClientAdmin:standAloneCalendar.html.twig',array('id' =>$id ) );
    }

     public function interfaceAction()
    {
    	$ac = new AdminClient();
        return new Response("interface ok");
    }

     public function viewAction()
    {
    	return $this->render('OVTFrontEndProviderBundle:Provider:profil.twig.html');
    }

    public function balaAction()
    {
        return $this->render('OVTBackEndAdminBundle:Gestion:newTest.html.twig');
    }

    public function mailAction()
    {
        $message = \Swift_Message::newInstance()
            ->setSubject('REUNION EQUIPE URGENTE')
            ->setFrom('khadim.ndiaye@orange.com')
            ->setTo('ndiaye.khadim.inpt@gmail.com')
            ->setBody( 'Bonjour,   Khadim il faut le renvoyer <i>définitivement<i>, il a rien fait de bon.')
            ->setReplyTo(array('ndiaye.khadim.inpt@gmail.com' => 'Khadim')) 
            ->setContentType("text/html")
        ; 
        try{
            $this->get('mailer')->send($message);
            return new Response('OK');
        }catch(\Swift_TransportException $e){ 
            return new Response($e->getMessage() );
        }
        
    }
}
