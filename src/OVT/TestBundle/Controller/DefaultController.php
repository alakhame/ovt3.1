<?php

namespace OVT\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\AdminClient;
use OVT\GeneralBundle\Entity\Notification;
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
        $body="Bonjour, <br/>";
        $body.="<br/>Je vous écris pour solliciter une autorisation d'absence le lundi 13 juillet et ce pour de raisons personnelles.";
        $body.="<br/>Je m'engage à travailler à distance durant mon absence. Je vous remercie d'avance.<br/>";
        $body.="<br/>Cordialement,";
        $message = \Swift_Message::newInstance()
            ->setSubject("Demande d'autorisation d'absence")
            ->setFrom('khadim.ndiaye@orange.com')
            ->setTo('lionel.courval@orange.com')
            ->setBody($body)
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

    public function listNotificationAction() {
        $superAdmin = $this->get('superadmin');
        $user = $superAdmin->getUserById(52);
        return new Response(var_dump($superAdmin->getNotificationsByUser($user)));
    }

    public function addNotificationAction() {
        $superAdmin = $this->get('superadmin');
        $userTo = $superAdmin->getUserById(52);
        $userFrom = $superAdmin->getUserById(1);
        $notification = new Notification();
        $notification->setMessage("Bonjour");
        $notification->setNotifierid($userFrom); 
        $notification->addUser($userTo);

        return new Response(var_dump($superAdmin->createNotification($notification)));       
    }
}
