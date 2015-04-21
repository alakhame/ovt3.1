<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\Service;
 use Symfony\Component\HttpFoundation\Request;

class OrgServiceAdminController extends Controller
{   
    

    public function manageServicesAction(Request $req, $organisation, $idOrg ){
	   

    	$superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($idOrg);
        $services=$superAdmin->getAllServices();
        $orgServices=$org->getService();
        $rep="d";
        if($req->getMethod()=="POST"){

            foreach($services as $s) {
                if(isset($_POST["checkbox_service_".$s->getId()])){
                    if(!$org->getService()->contains($s))
                        $org->addService($s);
                }else{
                     if($org->getService()->contains($s))
                        $org->removeService($s);
                }
                $superAdmin->update(); 
            }
            $message="Les changements ont bien été pris en compte";
            return $this->render('OVTBackEndAdminBundle:Service:manageServices.html.twig',array('org'=>$org,
            'services'=>$services, 'orgServices'=>$orgServices,'type'=>$organisation,'message'=>$message));
        }

        return $this->render('OVTBackEndAdminBundle:Service:manageServices.html.twig',array('org'=>$org,
            'services'=>$services, 'orgServices'=>$orgServices,'type'=>$organisation));
    }

}
