<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\UserBundle\Entity\User;
 use Symfony\Component\HttpFoundation\Request;

class UserAdminController extends Controller
{   

    public function getAllUsersAction( ){
	    
    	$superAdmin=$this->get('superadmin');
        $users=$superAdmin->getAllUsers();

        return $this->render('OVTBackEndAdminBundle:User:allUsers.html.twig',array('users'=>$users));
    }


    public function addNewAction(){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
       
        
        $name=$request->request->get("orgName");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $adminID=$request->request->get("adminID");

        $org = new Organisation();
        $org->setName($name);
        $org->setAddress($address);
        $org->setPhonenumber($phoneNumber);
        $org->setAdminid(1);//$org->setAdminid($adminID);
        $org->setType("provider");
        $org->setHashlink(sha1($this->salt1.$name.$this->salt2));

        $superAdmin->createOrganisation($org);
        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>'user')));
    }

     public function getUserByIdAction($id ){
        $superAdmin=$this->get('superadmin');
        $user=$superAdmin->getUserById($id);

        return $this->render('OVTBackEndAdminBundle:User:userInfos.json.twig',array('user'=>$user));;
        
    }

    public function getUserByRoleAction($role){
        $superAdmin=$this->get('superadmin');
        $user=$superAdmin->getUserByRole($role);
        return $this->render('OVTBackEndAdminBundle:User:allUsers.html.twig',array('orgs'=>$orgs));
    }
}
