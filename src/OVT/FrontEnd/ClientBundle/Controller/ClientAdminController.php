<?php

namespace OVT\FrontEnd\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\UserBundle\Entity\User;
use OVT\GeneralBundle\Entity\Client;
use OVT\GeneralBundle\Entity\Clientservicegroup;

class ClientAdminController extends Controller
{


	


	public function authorizedServicesAction($orgID){
		
		$adminClient=$this->get('clientadmin');
		$user= $this->container->get('security.context')->getToken()->getUser();
		if($orgID!=-1) 
			$org = $adminClient->getOrganisationById($orgID) ;
		else 
			return new Response(" error ");
		$services = $org->getService();
		$allService = $user->getOrganisation()->getService() ;
		$response='';
		foreach ($services as $s) {
			if($allService->contains($s))
				$response.='<option value="'.$s->getId().'">'.$s->getName().'</option>';
		}

		return new Response($response);
	}
	
	public function authorisedOrgsAction(){
		$adminClient=$this->get('clientadmin');
		$user= $this->container->get('security.context')->getToken()->getUser();
		$orgs = $adminClient->getClientOrgGroupByUser($user);
		$response='<option value="">---</option>';
		foreach ($orgs as $o) {
			$response.='<option value="'.$o->getId().'">'.$o->getName().'</option>';
		}

		return new Response($response);
	}

	public function getSessionByIdAction($id){
        $adminClient=$this->get('clientadmin');
        $session=$adminClient->getSessionById($id);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:sessionInfos.json.twig',array('s'=>$session));
    }

    public function updateStateSessionAction(Request $request, $action){
        $idSession=$request->request->get('idSession');
        $adminClient=$this->get('clientadmin');
        $session=$adminClient->getSessionById($idSession);
        switch ($action) {
            case 'cancel':
                $session->setState('CANCELED');
                break;
            case 'accept':
                $session->setState('ACCEPTED');
                break;
            case 'refuse':
                $session->setState('REFUSED');
                break;
            case 'terminate':
                $session->setState('TERMINATED');
                break;
            case 'delete':
                $session->setState('DELETED');
                break;
            case 'restaure':
                $session->setState('TO_CONFIRM');
                break;
            default:
                break;
        }
        $adminClient->update();
        return $this->redirect($this->generateUrl('ovt_front_end_client_list_sessions' ));
    }


    public function usersAction(){
    	$adminClient=$this->get('clientadmin');
    	$admin= $this->container->get('security.context')->getToken()->getUser();
    	$clients = $adminClient->retriveClientsFromAdmin($admin);
    	return $this->render('OVTFrontEndClientBundle:ClientAdmin:users.html.twig',array('clients'=>$clients));
    }

    public function getClientByIdAction($id){
        $adminClient=$this->get('clientadmin');
        $client=$adminClient->getClientFromUserID($id);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:clientInfos.json.twig',array('w'=>$client));
    }

    public function renderJSONClientServiceGroupsAction(){
        $adminClient=$this->get('clientadmin');
        $admin=  $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminClient->retrieveGroups($admin);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:groupsInfos.json.twig',array('groups'=>$groups));
    } 


    public function deleteUserByIdAction(Request $request){
        $clientID=$request->request->get('idClient');
        $adminClient=$this->get('clientadmin');
        $adminClient->deleteClientById($clientID);
        return new Response("OK!");
    }


    public function setGroupUserAction(Request $request){
        $adminClient=$this->get('clientadmin');
        $client=$adminClient->getClientById($request->request->get('idClient'));
        $group=$adminClient->getGroupById($request->request->get('idGroup'));
        $client->setGroup($group);
        $adminClient->update();

        return new Response('OK');
    }

    public function updateClientAction(Request $request ){
        $adminClient=$this->get('clientadmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
         
        $client=$adminClient->getClientById($request->request->get("clientID"));
        $userType=$request->request->get('userType');

        
        $encoderFactory=$this->get('security.encoder_factory');
        $encoder=$encoderFactory->getEncoder($client->getUser());
        
        $firstName=$request->request->get("firstName");
        $lastName=$request->request->get("lastName");
        $email=$request->request->get("email");
        $password=$request->request->get("password");
        $confirmPassword=$request->request->get("confirmPassword");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $role=$request->request->get("role");
        $type="Client";
        
        $equipments=$request->request->get("equipments");
        $language=$request->request->get("language");
        $org=$admin->getOrganisation();

        

        $client->getUser()->setFirstname($firstName);
        $client->getUser()->setLastName($lastName);
        $client->getUser()->setUsername($email);
        $client->getUser()->setEmail($email);
        $client->getUser()->setPassword($encoder->encodePassword($password, $client->getUser()->getSalt()));
        $client->getUser()->setAddress($address);
        $client->getUser()->setPhoneNumber($phoneNumber);
        $client->getUser()->addRole($role);
        $client->getUser()->setType($type);
        $client->getUser()->setState("actif");
        $client->getUser()->setOrganisation($org);
        
        
        $client->setEquipements($equipments);
        $client->setLanguage($language);
         
        $adminClient->createClient($client);
        return $this->redirect($this->generateUrl('ovt_front_end_admin_client_users' ));

    }




    public function addNewClientAction(Request $request ){
        $adminClient=$this->get('clientadmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
         
         
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
        $equipments=$request->request->get("equipments");
        $type="Client";
        $language=$request->request->get("language");
        $groupId=$request->request->get("group");
        $org=$admin->getOrganisation();

         

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
        $user->setOrganisation($org);
        $userManager->updateUser($user);
 
        $client = new Client();
        $client->setUser($user);
        $client->setLanguage($language);
        $client->setEquipements($equipments);
        $client->setGroup($adminClient->getGroupById($groupId));
        $adminClient->createClient($client);
        return $this->redirect($this->generateUrl('ovt_front_end_admin_client_users' ));

    }

    public function renderClientGroupsAction(){
        $response="";
        $adminClient=$this->get('clientadmin');
        $admin=  $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminClient->retrieveGroups($admin);
        foreach ($groups as $g) {
            $response.="<option value=".$g->getId().">".$g->getName()."</option>";
        }
        return new Response($response);
    } 
















	public function testAction(){
		return $this->renderClientGroupsAction();
	}

}