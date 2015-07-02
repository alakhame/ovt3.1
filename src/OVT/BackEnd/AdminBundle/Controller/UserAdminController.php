<?php

namespace OVT\BackEnd\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use OVT\UserBundle\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class UserAdminController extends Controller
{   

    public function getAllUsersAction( ){
	    
    	$superAdmin=$this->get('superadmin');
        $users=$superAdmin->getAllUsers();

        return $this->render('OVTBackEndAdminBundle:User:allUsers.html.twig',array('users'=>$users));
    }


    public function addNewAction( ){
        $request = $this->getRequest();
        $superAdmin=$this->get('superadmin');
        $userManager = $this->get('fos_user.user_manager');
        $userType=$request->request->get('userType');

        $user = $userManager->createUser();
        $user->setEnabled(true);
        $encoderFactory=$this->get('security.encoder_factory');
        $encoder=$encoderFactory->getEncoder($user);
        
        $firstName=$request->request->get("firstName");
        $lastName=$request->request->get("lastName");
        $email=$request->request->get("email");
        $password=$request->request->get("password");
        $confirmPassword=$request->request->get("confirmPassword");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $role=$request->request->get("role");
        switch($role){
            case "ROLE_COM_CLIENT":
            $type="Administrateur Client";
                break;

            case "ROLE_PROVIDER_ADMIN":
            $type="Administrateur Prestataire";
                break;

        }
       
        if($password!=$confirmPassword){
            return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion_new',array('gestion'=>$userType,
                                                        'error'=>'Les mots de passe ne correspondent pas !')));
        }

        $user->setFirstname($firstName);
        $user->setLastName($lastName);
        $user->setUsername($email);
        $user->setEmail($email);
        $user->setPassword($encoder->encodePassword($password, $user->getSalt()));
        $user->setAddress($address);
        $user->setPhoneNumber($phoneNumber);
        $user->addRole($role);
        $user->setType($type);
        $user->setState("actif");
        $userManager->updateUser($user);

        $superAdmin->newClientWorkerFromUser($user);
        $superAdmin->update();

        return $this->redirect($this->generateUrl('ovt_back_end_admin_gestion',array('gestion'=>$userType)));
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

    public function listAdminsAction($type){
        $superAdmin=$this->get('superadmin');
        switch ($type) {
            case 'client':
                $users=$superAdmin->getClientAdmins();
                break;
            case 'provider':
                $users=$superAdmin->getProviderAdmins();
                break;
            case 'super':
                $users=$superAdmin->getSuperAdmins();
                break;
            case 'all':
                $users=$superAdmin->getAllAdmins();
                break;
            default:
                break;
        }
        $response="";
        foreach ($users as $u) {
            $response.='<option value="'.$u->getId().'">'.$u->getFirstname().' '.$u->getLastname().'</option>';
        }
        return new Response($response);
    }
}
