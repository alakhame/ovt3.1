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

    public function addNewOrgAction($organisation){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
       
        
        $name=$request->request->get("orgName");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $email = $request->request->get("email");
        //$adminID=$request->request->get("adminID");
        //$admin=$superAdmin->getUserById($adminID);

        $org = new Organisation();
        $org->setName($name);
        $org->setAddress($address);
        $org->setPhonenumber($phoneNumber);
        $org->setEmail($email);
        //$org->addAdmin($admin);
        //$admin->setOrganisation($org);
        $org->setType($organisation);
        $org->setHashlink(sha1($this->salt1.$name.$this->salt2));

        $superAdmin->createOrganisation($org);
       switch($organisation){
            case 'client': 
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
                break;
            case 'provider' :   
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
                break;
        }
    }
    
   /* public function addNewClientAction(){
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
        $admin->setOrganisation($org);
        $superAdmin->createUser($admin);


        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
    }
*/
     

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
                return $this->render('OVTBackEndAdminBundle:client:orgInfos.json.twig',array('org'=>$org ));
                break;
            case 'provider' :   
                return $this->render('OVTBackEndAdminBundle:provider:orgInfos.json.twig',array('org'=>$org ));
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

  

    public function setAdminAction(Request $request, $org){
        $superAdmin=$this->get('superadmin');
        $adminId=$request->request->get('admin');
        $orgId=$request->request->get('orgId'); 
        $orgType=$org;
        $organisation=$superAdmin->getOrganisationById($orgId);
        $user=$superAdmin->getUserById($adminId);


        $user->setOrganisation($organisation);
        $organisation->addAdmin($user);
        $superAdmin->update();

 
        return new Response('ok!');
    }

    public function deleteAdminAction(Request $request,$idOrg,$idAdmin,$org){
        $superAdmin=$this->get('superadmin');

        $organisation=$superAdmin->getOrganisationById($idOrg);
        $user=$superAdmin->getUserById($idAdmin);

        $organisation->removeAdmin($user);
        $user->setOrganisation(null);

        $superAdmin->update();

        return new Response('OK!'); 
    }

    public function updateAction(Request $request,$idOrg, $org){
        $superAdmin=$this->get('superadmin');
        $organisation=$org;
        
        
        $org=$superAdmin->getOrganisationById($idOrg);
        switch($organisation){
            case 'client': 
               return $this->render('OVTBackEndAdminBundle:client:updateOrganisation.html.twig',array('org'=>$org));
                break;
            case 'provider' :   
                return $this->render('OVTBackEndAdminBundle:provider:updateOrganisation.html.twig',array('org'=>$org));
                break; 
        }
        
    }

    public function updatePostAction(Request $request, $org){
        $superAdmin=$this->get('superadmin');
        $organisation=$org; 

        $org=$superAdmin->getOrganisationById($request->request->get('orgId'));
        $org->setName($request->request->get('name'));
        $org->setAddress($request->request->get('address'));
        $org->setPhonenumber($request->request->get('phoneNumber')); 
        $org->setEmail($request->request->get('email'));
        $superAdmin->update();

        switch($organisation){
            case 'client': 
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
                break;
            case 'provider' :   
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
                break;
        } 
    }


    public function deleteOrgAction(Request $req, $org){
        $superAdmin=$this->get('superadmin'); 
        $organisation=$superAdmin->getOrganisationById($req->request->get('idOrg'));
        $superAdmin->deleteOrganisation($organisation);
        $superAdmin->update();
	return new Response('OK!'); 
        switch($org){
            case 'client': 
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'client')));
                break;
            case 'provider' :   
                return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'provider')));
                break;
            default:
                return new Response(get_class($org));
                break;
        }
    }
}
