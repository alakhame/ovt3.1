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
}
