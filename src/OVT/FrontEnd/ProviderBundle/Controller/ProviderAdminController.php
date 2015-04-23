<?php

namespace OVT\FrontEnd\ProviderBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use OVT\UserBundle\Entity\User;
use OVT\GeneralBundle\Entity\Worker;
use OVT\GeneralBundle\Entity\Providerservicegroup;

class ProviderAdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:index.html.twig');
    }

     public function setSessionsAction()
    {
        $adminProvider=$this->get('provideradmin');
        $admin= $this->container->get('security.context')->getToken()->getUser();
        $workers = $adminProvider->retriveWorkersFromAdmin($admin);
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:affectation.html.twig',array('workers'=>$workers));
    }

    public function getWaitingSessionsAction(){
    	$adminProvider=$this->get('provideradmin');
    	$user=  $this->container->get('security.context')->getToken()->getUser();
    	return new Response($adminProvider->getWaitingSessions($user));
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

    public function profileViewAction(){
        $user= $this->container->get('security.context')->getToken()->getUser();
        return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:profile.html.twig',array('user'=>$user));
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
    
    public function workerAction(){
    	$adminProvider=$this->get('provideradmin');
    	$admin= $this->container->get('security.context')->getToken()->getUser();
    	$workers = $adminProvider->retriveWorkersFromAdmin($admin);
    	return $this->render('OVTFrontEndProviderBundle:ProviderAdmin:workers.html.twig',array('workers'=>$workers));
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
        $groupId=$request->request->get("group");
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
        $worker->setGroup($adminProvider->getGroupFromId($groupId));
        $adminProvider->createWorker($worker);
        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker' ));

    }


    public function updateStateSessionAction(Request $request, $action){
        $idSession=$request->request->get('idSession');
       // return new Response($idSession);
        $adminProvider=$this->get('provideradmin');
        $session=$adminProvider->getSessionById($idSession);
        switch ($action) {
            case 'cancel':
                $session->setState('CANCELED');
                break;
            case 'refuse':
                $session->setState('REFUSED');
                break;
            case 'terminate':
                $session->setState('TERMINATED');
                break;
            default:
                break;
        }
        $adminProvider->update();
        return $this->redirect($this->generateUrl('ovt_front_end_admin_provider_worker' ));
        /*
        $response= new Response();
        $response->setContent('OK');
        $response->setStatusCode(200);
        $response->send(); */
    }







    public function testAction (){
    	//$adminProvider=$this->get('provideradmin');
    	//$w=$adminProvider->getGroupFromId(1);
        return new Response($this->getSessionByIdAction(3));
    }


}
