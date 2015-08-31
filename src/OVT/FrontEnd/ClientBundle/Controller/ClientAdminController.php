<?php

namespace OVT\FrontEnd\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\UserBundle\Entity\User;
use OVT\GeneralBundle\Entity\Client;
use OVT\GeneralBundle\Entity\Notification;
use OVT\GeneralBundle\Entity\Clientservicegroup;
use OVT\GeneralBundle\Entity\Collaboration;

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

    public function getOrgByServiceAction($serviceId){
        
        $adminClient=$this->get('clientadmin');
        $user= $this->container->get('security.context')->getToken()->getUser();
        $response='';
        $allOrgsService = $adminClient->getAllOrgsByServiceId($serviceId); 

        foreach ($allOrgsService as $o) { 
            $response.='<option value="'.$o->getId().'">'.$o->getName().'</option>';
        }

        return new Response($response);
    }
	
	public function authorisedOrgsAction(){
		$adminClient=$this->get('clientadmin');
		$user= $this->container->get('security.context')->getToken()->getUser();
		$orgs = $adminClient->getClientOrgGroupByUser($user);
		$response='<option value="" disabled selected>---</option>';
		foreach ($orgs as $o) {
			$response.='<option value="'.$o->getId().'">'.$o->getName().'</option>';
		}

		return new Response($response);
	}

	public function getSessionByIdAction($id){
        $adminClient=$this->get('clientadmin');
        $session=$adminClient->getSessionById($id);
        $props=$adminClient->getSessionOffersBySession($session);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:sessionInfos.json.twig',
            array('s'=>$session,"props"=>$props));
    }

    public function updateStateSessionAction(Request $request, $action){
        $idSession=$request->request->get('idSession');
        $adminClient=$this->get('clientadmin');
        $superAdmin=$this->get('superadmin');
        $session=$adminClient->getSessionById($idSession);
        $template='';
        $notifTemplate='';
        switch ($action) {
            case 'cancel':
                $session->setState('CANCELED');
                $template='cancel';
                $notifTemplate='cancelSession';
                break;
            case 'accept':
                $session->setState('ACCEPTED');
                $template='validated';
                break;
            case 'refuse':
                $session->setState('REFUSED');
                $template='decline';
                break;
            case 'terminate':
                $session->setState('TERMINATED');
                $notifTemplate='terminateSession';
                break;
            case 'delete':
                $session->setState('DELETED');
                $template='deleted';
                $notifTemplate='deletedSession';
                break;
            case 'restaure':
                $session->setState('TO_CONFIRM');
                $template='restore';
                $notifTemplate='restoreSession';
                break;
            default:
                break;
        }
        $adminClient->update();

        if($template!=''){
            /**** SEND MAIL ****/
            $messageToClient = \Swift_Message::newInstance()
                ->setSubject('Changement Etat de session sur OVT 3.1')
                ->setFrom('noreply-ovt@orange.com')
                ->setTo($session->getClient()->getUser()->getEmail())
                ->setBody($this->renderView('OVTAPINotificationBundle:Session:'.$template.'.html.twig',array(
                        "session"=>$session,
                        "receiver"=>$session->getClient()->getUser()
                )))
                ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
				->setContentType("text/html")
            ;
            $this->get('mailer')->send($messageToClient); 
            
            if($session->getWorker()!=null){
                $messageToWorker = \Swift_Message::newInstance()
                    ->setSubject('Changement Etat de session sur OVT 3.1')
                    ->setFrom('noreply-ovt@orange.com')
                    ->setTo($session->getWorker()->getUser()->getEmail())
                    ->setBody($this->renderView('OVTAPINotificationBundle:Session:'.$template.'.html.twig',array(
                            "session"=>$session,
                            "receiver"=>$session->getWorker()->getUser()
                    )))
                    ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT'))
					->setContentType("text/html")					
                ;
                $this->get('mailer')->send($messageToWorker); 
            }
            /**** END *********/
        }

        if($notifTemplate != ''){

            /********* SEND NOTIFICATION  ******/
            $notification = new Notification();
            $notification->setMessage($this->renderView('OVTAPINotificationBundle:FlashInfo/Session:'.$notifTemplate.'.html.twig', array(
                        "session"=>$session)));
            $notification->setNotifierid($session->getClient()->getUser());

            switch ($notifTemplate) {
                case 'cancelSession':
                    foreach ($session->getOrganisation()->getAdmins() as $admin){
                        $notification->addUser($admin);
                    }
                    foreach ($session->getClient()->getUser()->getOrganisation()->getAdmins() as $adminC) {
                        $notification->addUser($adminC);
                    }
                    break;
                case 'terminate':
                    $worker = $session->getWorker()->getUser();
                    $client = $session->getClient()->getUser();
                    $notification->addUser($worker);
                    $notification->addUser($client);
                    break;
                default:
                    break;
            }

            $superAdmin->createNotification($notification);

            /********* END ***********/
        }

        return $this->redirect($this->generateUrl('ovt_front_end_client_list_sessions' ));
    }


    public function usersAction(Request $req){
    	$adminClient=$this->get('clientadmin');
    	$admin= $this->container->get('security.context')->getToken()->getUser();
    	$clients = $adminClient->retriveClientsFromAdmin($admin); 
    	return $this->render('OVTFrontEndClientBundle:ClientAdmin:users.html.twig',
            array('clients'=>$clients,'defaultClick'=>$req->get('defaultClick')));
    }

    public function collaborationAction(Request $req){
        $adminClient=$this->get('clientadmin');
        $admin= $this->container->get('security.context')->getToken()->getUser(); 
        $orgClient=$admin->getOrganisation();
        $authorisedOrgs=$adminClient->getUniqueOrgsByServices($orgClient->getService());
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:collaboration.html.twig',
            array('client'=>$orgClient,
                'authorisedOrgs' =>   $authorisedOrgs,
                'defaultClick'=>$req->get('defaultClick')));
    }

    public function getCollabsByProviderIdAction($idProvider){
        $adminClient=$this->get('clientadmin');
        $admin=$this->container->get('security.context')->getToken()->getUser(); 
        $idClient=$admin->getOrganisation()->getId();
        $collabs=$adminClient->getCollabsByProviderId($idProvider,$idClient);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:collabs.json.twig',
            array('collabs'=>$collabs
                ));
    }

    public function getDivCollabsByProviderIdAction($idProvider){
        $adminClient=$this->get('clientadmin');
        $admin=$this->container->get('security.context')->getToken()->getUser(); 
        $idClient=$admin->getOrganisation()->getId();
        $provider=$adminClient->getOrganisationById($idProvider);
        $collabs=$adminClient->getCollabsByProviderId($idProvider,$idClient);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:servicesCollab.html.twig',
            array('collabs'=>$collabs,
                'provider'=>$provider,
                'client'=>$admin->getOrganisation()));
    }

    public function removeCollabAction($id){
        $adminClient=$this->get('clientadmin');
        $adminClient->removeCollabById($id);
        return new Response('OK!');
    }

    public function addCollabAction($idS,$idP,$idC){
        $adminClient=$this->get('clientadmin');
        $collab = new collaboration();
        $service=$adminClient->getServiceById($idS);
        $provider=$adminClient->getOrganisationById($idP);
        $client=$adminClient->getOrganisationById($idC);
        $collab->setService($service);
        $collab->setProvider($provider);
        $collab->setOrgClient($client);
        $adminClient->createCollaboration($collab);
        return new response('oK!');
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
        $client=$adminClient->getClientById($clientID);
        $client->getUser()->setEnabled(0);

         /**** SEND MAIL ****/
        $message = \Swift_Message::newInstance()
            ->setSubject('Suppression de compte sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($client->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:User:deleted.html.twig',array(
                    "receiver"=>$client->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);

        /**** END *********/ 

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
        return $this->redirect($this->generateUrl('ovt_front_end_admin_client_users',
                array('defaultClick' => $client->getUser()->getId() ) ));

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
        //$client->setGroup($adminClient->getGroupById($groupId));
        $adminClient->createClient($client);

        /**** SEND MAIL ****/
        $message = \Swift_Message::newInstance()
            ->setSubject('Création de compte Client sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($user->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:User:new_user.html.twig',array(
                    "receiver"=>$client->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);

        /**** END *********/

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


    public function groupAction(){
        $adminClient=$this->get('clientadmin'); 
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminClient->retrieveGroups($admin);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:groups.html.twig',array('groups'=>$groups));
    }

    public function getGroupByIdAction($id){
        $adminClient=$this->get('clientadmin'); 
        $group=$adminClient->getGroupById($id);
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:groupInfos.json.twig',array('g'=>$group));
    }


    public function deleteGroupByIdAction(Request $request){
        $groupID=$request->request->get('idGroup');
        $adminClient=$this->get('clientadmin'); 
        $adminClient->deleteGroupById($groupID);
        return new Response("OK!");
    }

    public  function updateGroupAction (Request $request){
        $adminClient=$this->get('clientadmin'); 
        $req=$request->request;
        $group=$adminClient->getGroupById($req->get('groupID'));

        $group->setName($req->get('name'));
        $group->setDescription($req->get('description'));
        $group->setMoneyLimit($req->get('moneyLimit'));

        $adminClient->update();
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }

    public function addNewGroupAction(Request $request ){
        $adminClient=$this->get('clientadmin');  
        $admin= $this->container->get('security.context')->getToken()->getUser();

        $group = new Clientservicegroup();
        $group->setName($request->request->get('name'));
        $group->setDescription($request->request->get('description'));
        $group->setMoneyLimit($request->request->get('moneyLimit'));
        $group->setOrgClientOwner($admin->getOrganisation());

        $adminClient->create($group);
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }


    public function manageOrgGroupAction(Request $request, $id){
        $adminClient=$this->get('clientadmin'); 
        

        if($request->getMethod()=="GET"){
            $group=$adminClient->getGroupById($id);
            $selectedPrestas=$group->getOrganisation();
            $prestas=$adminClient->getAllPrestas();return $this->render('OVTFrontEndClientBundle:ClientAdmin:updateGroupOrg.html.twig',
            array('g'=>$group,'prestas'=>$prestas,'selectedPrestas'=>$selectedPrestas));
        }

       
        $group=$adminClient->getGroupById($request->request->get('idGroup'));
        $checkedOrgs = $request->request->get('checkbox_prestas');
        $group->initializeOrganisation( );
        //return new Response(var_dump($checkedOrgs));
        if(!empty($checkedOrgs)){
            $n=count($checkedOrgs);
            for($i=0; $i <$n; $i++)
            {
                $choosedOrg=$adminClient->getOrganisationById($checkedOrgs[$i]);
                $group->addOrganisation($choosedOrg);
            }
        }

        $adminClient->update();

        return $this->groupAction();

    }

    public function servicesChoiceAction($idClient){
        $adminClient=$this->get('clientadmin');
        $client=$adminClient->getClientFromUserID($idClient);
        
        $allservices=$client->getUser()->getOrganisation()->getService();
        $clientServices = $client->getAuthorizedServices();
        return $this->render('OVTFrontEndClientBundle:ClientAdmin:servicesChoice.html.twig',array(
                'allS'=>$allservices,
                'authS'=>$clientServices,
                'client'=>$client));
    }

    public function serviceToggleAction($idClient,$idService){
        $adminClient=$this->get('clientadmin');
        $client=$adminClient->getClientFromUserID($idClient);
        $service=$adminClient->getServiceById($idService);
         
        if($client->getAuthorizedServices()->contains($service)){
            $client->removeAuthorizedServices($service);
            $adminClient->update();
            return new Response('0');
        } else {
            $client->addAuthorizedServices($service);
            $adminClient->update();
            return new Response('1');
        }
    }









	public function testAction(){
		return $this->renderClientGroupsAction();
	}

}