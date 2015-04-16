<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\GeneralBundle\Entity\Organisation;
 use Symfony\Component\HttpFoundation\Request;

class OrganisationAdminController extends Controller
{   
    protected $salt1="banda";
    protected $salt2="fassi";
    public function getAllOrganisationsAction( ){
	    
    	$superAdmin=$this->get('superadmin');
        $orgs=$superAdmin->getAllOrganisations();

        return $this->render('OVTBackEndAdminBundle:Client:allOrganisations.html.twig',array('orgs'=>$orgs));
    }

    public function addNewClientAction(){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
       
        
        $name=$request->request->get("orgName");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $adminID=$request->request->get("adminID");
        $admin=$superAdmin->getUserById($adminID);

        $org = new Organisation();
        $org->setName($name);
        $org->setAddress($address);
        $org->setPhonenumber($phoneNumber);
        $org->addAdmin($admin);
        $org->setType("client");
        $org->setHashlink(sha1($this->salt1.$name.$this->salt2));

        $superAdmin->createOrganisation($org);
        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
    }

    public function addNewProviderAction(){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
       
        
        $name=$request->request->get("orgName");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $adminID=$request->request->get("adminID");
        $admin=$superAdmin->getUserById($adminID);

        $org = new Organisation();
        $org->setName($name);
        $org->setAddress($address);
        $org->setPhonenumber($phoneNumber);
        $org->addAdmin($admin);
        $org->setType("provider");
        $org->setHashlink(sha1($this->salt1.$name.$this->salt2));

        $superAdmin->createOrganisation($org);
        $admin->setOrganisation();
        $superAdmin->createUser($admin);


        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
    }

     

    public function getOrganisationsByTypeAction($type,$action){
        $superAdmin=$this->get('superadmin');
        $orgs=$superAdmin->getOrganisationsByType($type);
        return $this->render('OVTBackEndAdminBundle:client:allClientOrganisations.html.twig',array('orgs'=>$orgs,
                                                                                            'action'=>$action));
    }

    public function getOrgByIdAction($id,$organisation){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($id);
        switch($organisation){
            case 'client': 
                return $this->render('OVTBackEndAdminBundle:client:orgInfos.json.twig',array('org'=>$org));
                break;
            case 'provider' :   
                return $this->render('OVTBackEndAdminBundle:provider:orgInfos.json.twig',array('org'=>$org));
                break;
        }
    }

   /* public function getClientByIdAction($id ){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($id);
        return $this->render('OVTBackEndAdminBundle:client:orgInfos.json.twig',array('org'=>$org));
    }

    public function getProviderByIdAction($id ){
        $superAdmin=$this->get('superadmin');
        $org=$superAdmin->getOrganisationById($id);
        return $this->render('OVTBackEndAdminBundle:provider:orgInfos.json.twig',array('org'=>$org));
    }*/

  

    public function setAdminAction(Request $request){
        $superAdmin=$this->get('superadmin');
        $adminId=$request->request->get('admin');
        $orgId=$request->request->get('idOrg');

        $org=$superAdmin->getOrganisationById($orgId);
        $user=$superAdmin->getUserById($adminId);

        $org->addAdmin($user);
        $user->setOrganisation($org);

        $superAdmin->update();

        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
    }

    public function deleteAdminAction(Request $request,$idOrg,$idAdmin,$org){
        $superAdmin=$this->get('superadmin');

        $org=$superAdmin->getOrganisationById($idOrg);
        $user=$superAdmin->getUserById($idAdmin);

        $org->removeAdmin($user);
        $user->setOrganisation(null);

        $superAdmin->update();
        return new Response('0');
    }

    public function updateAction(Request $request,$idOrg, $org){
        $superAdmin=$this->get('superadmin');

        
        if($request->getMethod()=='POST'){
            $org=$superAdmin->getOrganisationById($request->request->get('orgId'));
            $org->setName($request->request->get('orgName'));
            $org->setAddress($request->request->get('address'));
            $org->setPhonenumber($request->request->get('phoneNumber'));
            $org->addAdmin($superAdmin->getUserById($request->request->get('adminID')));
            $superAdmin->update();
           
            switch($org){
                case 'client': 
                    return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
                    break;
                case 'provider' :   
                    return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
                    break;
            }
            
        }
        $org=$superAdmin->getOrganisationById($idOrg);
        switch($org){
            case 'client': 
               return $this->render('OVTBackEndAdminBundle:client:updateOrganisation.html.twig',array('org'=>$org));
                break;
            case 'provider' :   
                return $this->render('OVTBackEndAdminBundle:provider:updateOrganisation.html.twig',array('org'=>$org));
                break;
        }
        
    }
}
