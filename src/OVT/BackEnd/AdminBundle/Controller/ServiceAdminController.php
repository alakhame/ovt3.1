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

        return $this->render('OVTBackEndAdminBundle:service:allServices.html.twig',array('services'=>$services));
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
        return $this->render('OVTBackEndAdminBundle:service:serviceInfos.json.twig',array('service'=>$service));
    }

    public function updateAction(Request $req){
        $superAdmin=$this->get('superadmin');
        $service=$superAdmin->getServiceById($req->request->get('serviceID'));
        $service->setName($req->request->get('name'));
        $service->setDescription($req->request->get('description'));
        $superAdmin->update();
        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'service') ));
    }

    public function deleteAction(Request $req){
        $id=$req->request->get('id');
        $superAdmin=$this->get('superadmin');
        $superAdmin->deleteServiceById($id);
        $superAdmin->update();
        return new Response("OK!");
    }

     public function servicesChoiceAction($idOrg){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($idOrg);
        
        $allservices = $superAdmin->getAllServices();
        $orgServices = $org->getService();
        return $this->render('OVTBackEndAdminBundle:service:servicesChoice.html.twig',array(
                'allS'=>$allservices,
                'authS'=>$orgServices,
                'org'=>$org));
    }

    public function serviceToggleAction($idOrg,$idService){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($idOrg);
        $service=$superAdmin->getServiceById($idService);
         
        if($org->getService()->contains($service)){
            $org->removeService($service);
            $superAdmin->update();
            return new Response('0');
        } else {
            $org->addService($service);
            $superAdmin->update();
            return new Response('1');
        }
    }
}
