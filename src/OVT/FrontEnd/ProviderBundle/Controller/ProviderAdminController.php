<?php

namespace OVT\FrontEnd\ProviderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\UserBundle\Entity\User;
use OVT\GeneralBundle\Entity\Worker;
use OVT\GeneralBundle\Entity\Notification;
use OVT\GeneralBundle\Entity\Providerservicegroup;

class ProviderAdminController extends Controller
{ 
    public function setSessionsAction()
    {
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $workers = $adminProvider->retriveWorkersFromAdmin($admin);
        //$sessions=$adminProvider->getSessionsToAffect();
        $offers=$adminProvider->getSessionOffersToAffect($admin); 
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:affectation.html.twig',
            array('workers'=>$workers,'offers'=>$offers));
    }

    public function getWaitingSessionsAction(){
    	$adminProvider=$this->get('provideradmin');
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	return new Response($adminProvider->getWaitingSessions($user));
    } 

    public function getPlanifiedSessionsAction(){
        $adminProvider=$this->get('provideradmin');
        $user=  $this->container->get('security.context')->getToken()->getUser();
        return new Response($adminProvider->getPlanifiedSessions($user));
    } 

  	public function getSessionsToAffectAction(){
		$adminProvider=$this->get('provideradmin');
		$sessions=$adminProvider->getSessionsToAffect();
		return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:sessionList.html.twig',
				array('sessions'=>$sessions)); 
    }

    public function getCountSessionsToAffectAction(){
		$adminProvider=$this->get('provideradmin');
		return new Response(count($adminProvider->getSessionsToAffect()));
    }

    public function getCountOffersToAffectAction(){
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        return new Response(count($adminProvider->getSessionOffersToAffect($admin)));
    }

   

    public function renderProviderGroupsAction(){
        $response="";
        $adminProvider=$this->get('provideradmin');
        $admin=  $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminProvider->retrieveGroups($admin);
        foreach ($groups as $g) {
            $response.="<option value=".$g->getId().">".$g->getName()."</option>";
        }
        return new Response($response);
    } 

    public function renderJSONProviderGroupsAction(){
        $adminProvider=$this->get('provideradmin');
        $admin=  $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminProvider->retrieveGroups($admin);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:groupsInfos.json.twig',array('groups'=>$groups));
    } 
    
    public function workerAction(Request $req){
    	$adminProvider=$this->get('provideradmin');
    	$admin= $this->container->get('security.context')->getToken()->getUser();
    	$workers = $adminProvider->retriveWorkersFromAdmin($admin);
    	return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:workers.html.twig',
            array('workers'=>$workers,'defaultClick'=>$req->get('defaultClick')));
    }

    public function groupAction(){
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $groups=$adminProvider->retrieveGroups($admin);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:groups.html.twig',array('groups'=>$groups));
    }

    public function getSessionByIdAction($id){
        $adminProvider=$this->get('provideradmin');
        $session=$adminProvider->getSessionById($id);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:sessionInfos.json.twig',array('s'=>$session));
    }

    public function getGroupByIdAction($id){
        $adminProvider=$this->get('provideradmin');
        $group=$adminProvider->getGroupById($id);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:groupInfos.json.twig',array('g'=>$group));
    }

     public function getAllServicesJSONAction(){
        $superAdmin=$this->get('superadmin');
        $services=$superAdmin->getAllServices();
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:servicesInfos.json.twig',
                            array('services'=>$services));
    }

    public function addNewWorkerAction(Request $request ){
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $workers = $adminProvider->retriveWorkersFromAdmin($admin);
        if($request->getMethod()=="GET")
            return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:addWorker.html.twig',array('workers'=>$workers));

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
        $type="Employé Prestataire";
        
        $language=$request->request->get("language");
        //$groupId=$request->request->get("group");
        $org=$admin->getOrganisation();

        if($password!=$confirmPassword){
            return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_new_worker',
                                    array('error'=>'Les mots de passe ne correspondent pas !')));
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
        $user->setOrganisation($org);
        $userManager->updateUser($user);
 
        $worker = new Worker();
        $worker->setUser($user);
        $worker->setLanguage($language);
        //$worker->setGroupe($adminProvider->getGroupFromId($groupId));
        $adminProvider->createWorker($worker);

        /**** SEND MAIL ****/
        $message = \Swift_Message::newInstance()
            ->setSubject('Création de compte Prestataire sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($user->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:User:new_user.html.twig',array(
                    "receiver"=>$worker->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);

        /**** END *********/

        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker' ));

    }

    public function updateWorkerAction(Request $request ){
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
         
        $worker=$adminProvider->getWorkerById($request->request->get("workerID"));
        $userType=$request->request->get('userType');

        
        $encoderFactory=$this->get('security.encoder_factory');
        $encoder=$encoderFactory->getEncoder($worker->getUser());
        
        $firstName=$request->request->get("firstName");
        $lastName=$request->request->get("lastName");
        $email=$request->request->get("email");
        $password=$request->request->get("password");
        $confirmPassword=$request->request->get("confirmPassword");
        $address=$request->request->get("address");
        $phoneNumber=$request->request->get("phoneNumber");
        $role=$request->request->get("role");
        $type="Employé Prestataire";
        
        $language=$request->request->get("language");
        $org=$admin->getOrganisation();

        if($password!=$confirmPassword){
            return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_new_worker',
                                    array('error'=>'Les mots de passe ne correspondent pas !')));
        }

        $worker->getUser()->setFirstname($firstName);
        $worker->getUser()->setLastName($lastName);
        $worker->getUser()->setUsername($email);
        $worker->getUser()->setEmail($email);
        $worker->getUser()->setPassword($encoder->encodePassword($password, $worker->getUser()->getSalt()));
        $worker->getUser()->setAddress($address);
        $worker->getUser()->setPhoneNumber($phoneNumber);
        $worker->getUser()->addRole($role);
        $worker->getUser()->setType($type);
        $worker->getUser()->setState("actif");
        $worker->getUser()->setOrganisation($org);
        
        
        
        $worker->setLanguage($language);
         
        $adminProvider->createWorker($worker);
        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker',
                array('defaultClick'=>$worker->getUser()->getId()) ));

    }

    public function deleteWorkerByIdAction(Request $request){
        $workerID=$request->request->get('idWorker');
        $adminProvider=$this->get('provideradmin');
        $worker=$adminProvider->getWorkerById($workerID);  
        /**** SEND MAIL ****/
        $message = \Swift_Message::newInstance()
            ->setSubject('Suppression de compte  sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($worker->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:User:deleted.html.twig',array(
                    "receiver"=>$worker->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $this->get('mailer')->send($message);

        /**** END *********/ 

        $adminProvider->deleteWorkerById($workerID);
        return new Response("OK!");
    }

    public function deleteGroupByIdAction(Request $request){
        $groupID=$request->request->get('idGroup');
        $adminProvider=$this->get('provideradmin');
        $adminProvider->deleteGroupById($groupID);
        return new Response("OK!");
    }
    public function updateStateSessionAction(Request $request, $action){
        $idSession=$request->request->get('idSession');
        //$rep=var_dump($request->request);
        //return new Response(" retrieved id:".$rep);
        $adminProvider=$this->get('provideradmin');
        $superAdmin=$this->get('superadmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $session=$adminProvider->getSessionById($idSession);
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
                $notifTemplate='validatedSession';
                break;
            case 'refuse':
                $session->setState('REFUSED');
                $template='decline';
                $notifTemplate='declineSession';
                break;
            case 'terminate':
                $session->setState('TERMINATED');
                $notifTemplate='terminateSession';
                break;
            case 'delete':
                $session->setState('DELETED');
                $template='deleted';
                break;
            case 'restaure':
                $session->setState('ACCEPTED');
                $template='restore';
                break;
            default:
                break;
        }
        $adminProvider->update();
        
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
            $this->get('mailer')->send($messageToClient); 
            /**** END *********/
        }

        if($notifTemplate != ''){

            /********* SEND NOTIFICATION  ******/
            $notification = new Notification();
            $notification->setMessage($this->renderView('OVTAPINotificationBundle:FlashInfo/Session:'.$notifTemplate.'.html.twig', array(
                        "session"=>$session)));
            $notification->setNotifierid($admin);
            $client = $session->getClient->getUser();
            $notification->addUser($client);
            switch ($notifTemplate) {
                case 'decline':
                    foreach ($session->getClient()->getUser()->getOrganisation()->getAdmins as $adminC) {
                        $notification->addUser($adminC);
                    }
                    break;
                case 'validatedSession':
                    foreach ($session->getClient()->getUser()->getOrganisation()->getAdmins as $adminC) {
                        $notification->addUser($adminC);
                    }
                    break;
                case 'terminateSession':
                    $worker = $session->getWorker()->getUser();
                    $notification->addUser($worker);
                default:
                    break;
            }

            $superAdmin->createNotification($notification);
            /******* END ******/
        }

        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker' ));
        /*
        $response= new Response();
        $response->setContent('OK');
        $response->setStatusCode(200);
        $response->send(); */
    }

    public function refuseOfferAction(Request $request ){
        $idOffer=$request->request->get('idOffer'); 
        $adminProvider=$this->get('provideradmin'); 
        $adminProvider->deleteOfferById($idOffer);  
        $adminProvider->update();
        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker' ));
       
    }

    public  function updateSessionAction (Request $request){
        $adminProvider=$this->get('provideradmin');
        $req=$request->request;
        $session=$adminProvider->getSessionById($req->get('sessionID'));
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $superAdmin=$this->get('superadmin');
        $session->setTitle($req->get('title'));
        $session->setDescription($req->get('description'));
        //$session->setStarttime($req->get('startTime'));
        //$session->setEndtime($req->get('endTime'));

        $adminProvider->update();
        $referer = $request->headers->get('referer');

        /************** SEND MAIL ***************/
        $messageToClient = \Swift_Message::newInstance()
            ->setSubject('Modification de session sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($session->getClient()->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:Session:updated.html.twig',array(
                    "session"=>$session,
                    "receiver"=>$session->getClient()->getUser(), 
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $messageToWorker = \Swift_Message::newInstance()
            ->setSubject('Validation de session sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($session->getWorker()->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:Session:updated.html.twig',array(
                    "session"=>$session,
                    "receiver"=>$session->getWorker()->getUser(), 
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $this->get('mailer')->send($messageToClient);
        $this->get('mailer')->send($messageToWorker);


        /******** SEND NOTIFICATION *****************/
        $notification = new Notification();
        $notification->setMessage($this->renderView('OVTAPINotificationBundle:FlashInfo/Session:updatedSession.html.twig', array(
                        "session"=>$session)));
        $notification->setNotifierid($admin);
        $worker = $session->getWorker()->getUser();
        $notification->addUser($worker);
        $client = $session->getClient()->getUser();
        $notification->addUser($client);
        
        $superAdmin->createNotification($notificationToClient);

        /**************** END *********************/
        return $this->redirect($referer);
    }

    public  function updateGroupAction (Request $request){
        $adminProvider=$this->get('provideradmin');
        $superAdmin=$this->get('superadmin');
        $req=$request->request;
        $group=$adminProvider->getGroupById($req->get('groupID'));

        $group->setName($req->get('name'));
        $group->setDescription($req->get('description'));
        $group->setServiceid($superAdmin->getServiceById($req->get('service')));

        $adminProvider->update();
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }

    public function addNewGroupAction(Request $request ){
        $adminProvider=$this->get('provideradmin');
        $superAdmin=$this->get('superadmin');
        $service = $superAdmin->getServiceById($request->request->get('service'));
        $admin= $this->container->get('security.context')->getToken()->getUser();

        $group = new Providerservicegroup();
        $group->setName($request->request->get('name'));
        $group->setDescription($request->request->get('description'));
        $group->setServiceid($service);
        $group->setOrganisation($admin->getOrganisation());

        $adminProvider->createGroup($group);
        $referer = $request->headers->get('referer');

        return $this->redirect($referer);
    }

    public function renderWorkersSelectionAction($workers){
        $rep="";
        $rep.="<option value=".$workers[0]->getId()." selected>".$workers[0]->getFirstname()." ".$workers[0]->getLastname()."</option>";
        
        for ($i=1;$i<count($workers);$i++) {
          $rep.="<option value=".$workers[$i]->getId()." >".$workers[$i]->getFirstname()." ".$workers[$i]->getLastname()."</option>";
        }
        return new Response($rep);
    }

    public function affectWorkerToSessionAction(Request $request){
        $adminProvider=$this->get('provideradmin');
        $superAdmin=$this->get('superadmin');
        $offer=$adminProvider->getOfferById($request->request->get('oID'));
        $worker=$adminProvider->getWorkerFromUserID($request->request->get('wID'));
        $admin= $this->container->get('security.context')->getToken()->getUser();
        
        $session=$offer->getSession();
        $session->setWorker($worker);
        $session->setState('CONFIRMED_BY_PROVIDER');   
        $offer->setDecision(1);
        $adminProvider->update();

        /**** SEND MAIL ****/
        $messageToWorker = \Swift_Message::newInstance()
            ->setSubject('Affectation de session sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($worker->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:Service:affectation.html.twig',array(
                    "session"=>$session,
                    "receiver"=>$worker->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;
        $messageToClient = \Swift_Message::newInstance()
            ->setSubject('Affectation de session sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($session->getClient()->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:Session:affectation.html.twig',array(
                    "session"=>$session,
                    "receiver"=>$session->getClient()->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;

        $this->get('mailer')->send($messageToWorker);
        $this->get('mailer')->send($messageToClient);

        $messageToClient = \Swift_Message::newInstance()
            ->setSubject('Validation de session sur OVT 3.1')
            ->setFrom('noreply-ovt@orange.com')
            ->setTo($session->getClient()->getUser()->getEmail())
            ->setBody($this->renderView('OVTAPINotificationBundle:Session:validated.html.twig',array(
                    "session"=>$session,
                    "receiver"=>$session->getClient()->getUser(),
                    "admin"=>$this->container->get('security.context')->getToken()->getUser()
                )))
            ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
			->setContentType("text/html")
        ;

        $this->get('mailer')->send($messageToClient);
        foreach ($session->getClient()->getUser()->getOrganisation()->getAdmins() as $admin) {
            $messageToAdminClient = \Swift_Message::newInstance()
                ->setSubject('Validation de session sur OVT 3.1')
                ->setFrom('noreply-ovt@orange.com')
                ->setTo($admin->getEmail())
                ->setBody($this->renderView('OVTAPINotificationBundle:Session:validated_admin.html.twig',array(
                        "session"=>$session,
                        "receiver"=>$admin
                    )))
                ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT')) 
				->setContentType("text/html")
            ;
            $this->get('mailer')->send($messageToAdminClient);
        }
        
        /**********  SEND NOTIFICATION  *****************/
        
        $notification = new Notification();
        $notification->setMessage($this->renderView('OVTAPINotificationBundle:FlashInfo/Session:affectedSession.html.twig', array(
                        "session"=>$session)));
        $notification->setNotifierid($admin);
        $worker = $session->getWorker()->getUser();
        $notification->addUser($worker);

        $superAdmin->createNotification($notification); 

        $notificationToClient = new Notification();
        $notificationToClient->setMessage($this->renderView('OVTAPINotificationBundle:FlashInfo/Session:validatedSession.html.twig', array(
                        "session"=>$session)));
        $notificationToClient->setNotifierid($admin);
        $client = $session->getClient()->getUser();
        $notificationToClient->addUser($client);
        foreach ($session->getClient()->getUser()->getOrganisation()->getAdmins() as $adminC) {
            $notification->addUser($adminC);
        }
        
        $superAdmin->createNotification($notificationToClient);

        /****** END ******/

        return new Response('Success');
    }

    public function getWorkerByIdAction($id){
        $adminProvider=$this->get('provideradmin');
        $worker=$adminProvider->getWorkerFromUserID($id);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:workerInfos.json.twig',array('w'=>$worker));
    }

    public function setGroupWorkerAction(Request $request){
        $adminProvider=$this->get('provideradmin');
        $worker=$adminProvider->getWorkerById($request->request->get('idWorker'));
        $group=$adminProvider->getGroupFromId($request->request->get('idGroup'));
        $worker->setGroupe($group);
        $adminProvider->update();

        return new Response($request->request->get('idWorker').'OK'.$request->request->get('idGroup'));
    }

    public function viewWorkerCalendarAction(Request $request){
        return $this->render('OVTFrontEndProviderBundle:Provider:agendaCore.html.twig',
            array('idWorker'=>$request->request->get('idWorker')));
    }

    public function workerAffectedSessionsAction($id){
        $adminProvider=$this->get('provideradmin');
        $sessions=$adminProvider->getSessionsByWorkerId($id); 
        return $this->render('OVTFrontEndProviderBundle:Provider:sessions.json.twig', array('sessions' =>$sessions ));
    }

    public function testAction (){
    	$adminProvider=$this->get('provideradmin');
    	$w=$adminProvider->getWorkerById(1);
        return $this->deleteWorkerByIdAction(6);
    }


}
