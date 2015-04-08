<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\Organisation;
 use Symfony\Component\HttpFoundation\Request;

class OrganisationAdminController extends Controller
{   
    

    public function getAllOrganisationsAction( ){
	    
    	$superAdmin=$this->get('superadmin');
        $orgs=$superAdmin->getAllOrganisations();

        return $this->render('OVTBackEndAdminBundle:Client:allOrganisations.html.twig',array('orgs'=>$orgs));
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

     public function getOrganisationByIdAction($id ){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($id);

        return $this->render('OVTBackEndAdminBundle:Cleint:organisationInfos.json.twig',array('org'=>$sorg));;
        
    }

    public function getOrganisationsByType($type){
        $superAdmin=$this->get('superadmin');
        $orgs=$superAdmin->getOrganisationsByType($type);
        return $this->render('OVTBackEndAdminBundle:Client:allClientOrganisations.html.twig',array('orgs'=>$orgs));
    }
}
