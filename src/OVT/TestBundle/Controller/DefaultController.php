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
            ->setSubject('Objet Sérieux')
            ->setFrom('hubert.segond@orange.com')
            ->setTo('amal.zayani@orange.com')
            ->setBody( 'Bonjour encore Amal,   Tu peux me passer ton mot de passe ? C\'est très sérieux. Merci')
            ->setReplyTo(array('ndiaye.khadim.inpt@gmail.com' => 'Khadim')) 
        ;
        
        try{
            $this->get('mailer')->send($message);
            return new Response('OK');
        }catch(\Swift_TransportException $e){ 
        return new Response($e->getMessage() );
        }
        
    }
}
