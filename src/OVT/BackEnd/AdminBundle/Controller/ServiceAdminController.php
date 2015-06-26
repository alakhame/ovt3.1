<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\Service;
 use Symfony\Component\HttpFoundation\Request;

class ServiceAdminController extends Controller
{   
    

    public function getAllServicesAction( ){
	    
    	$response="<ul>";
    	$superAdmin=$this->get('superadmin');
        $services=$superAdmin->getAllServices();

        return $this->render('OVTBackEndAdminBundle:Service:allServices.html.twig',array('services'=>$services));
    }

    public function addNewAction(){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
       
        
        $name=$request->request->get("serviceName");
        $desc=$request->request->get("description");
        $service = new Service();
        $service->setName($name);
        $service->setDescription($desc);

        $superAdmin->createService($service);
        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'service')));
    }

     public function getServiceByIdAction($id ){
        $superAdmin=$this->get('superadmin');
        $service=$superAdmin->getServiceById($id);
        return $this->render('OVTBackEndAdminBundle:Service:serviceInfos.json.twig',array('service'=>$service));;
        
        
        
    }
}
