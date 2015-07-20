<?php

namespace OVT\BackEnd\AdminBundle\Entity;
use OVT\UserBundle\Entity\User ;
use OVT\GeneralBundle\Entity\Notification;
use OVT\GeneralBundle\Entity\ServiceManagement;
use OVT\GeneralBundle\Entity\OrganisationManagement;
use OVT\GeneralBundle\Entity\UserManagement;
use OVT\GeneralBundle\Entity\Organisation;
use OVT\GeneralBundle\Entity\Service ;
use OVT\GeneralBundle\Entity\Client ;
use OVT\GeneralBundle\Entity\Worker ;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;

class SuperAdmin extends User implements ServiceManagement, OrganisationManagement, UserManagement
{
    
    protected $em;
    protected $doctrine;
    protected $mailer;

    public function __construct(EntityManager $em, $mailer){
        $this->em=$em;
        $this->mailer=$mailer;
    }


    
    /************ SERVICE ***************************/

    public  function updateService( Service $s){

    }

	public  function createService( Service $service){
		$this->em->persist($service);
        $this->em->flush();
	}

	public  function deleteServiceById( $serviceID){ 
        $s=$this->getServiceById($serviceID);
        $this->em->remove($s); 
	}

	public  function getServiceById($id){
		return $this->em->getRepository('OVTGeneralBundle:Service')->find($id);
    }

    public  function getAllServices(){
		return $this->em->getRepository("OVTGeneralBundle:Service")->findAll();
    }

    /************** SESSION  ************************************/

    public  function getSessionByLink($link){
        return $this->em->getRepository("OVTGeneralBundle:Session")->findBy(array('link'=>$link));
    }

    public  function getAllSessions(){
        return $this->em->getRepository("OVTGeneralBundle:Session")->findAll();
    }

    public function terminatePastSessions(){
        $now = new \DateTime('now');
        $sessions = $this->getAllSessions();
        foreach ($sessions as $s) {
            if($s->getEndtime()<$now && $s->getState()=='ACCEPTED'){
                $s->setState('TERMINATED');
                /**** SEND MAIL ****/
        $bodyMail = "Bonjour,<br/>Vous avez dÃ©sormais accÃ¨s au document relatif Ã  la session de transcription intitulÃ© <i>";
        $bodyMail .= $s->getTitle()."</i>. <br/> A bientÃ´t, cordialement, <br/> OVT 3.1 ";
                $message = \Swift_Message::newInstance()
                    ->setSubject('Documents de session sur OVT 3.1')
                    ->setFrom('noreply-ovt@orange.com')
                    ->setTo($s->getClient()->getUser()->getEmail())
                    ->setBody($bodyMail)
                    ->setReplyTo(array('sav-ovt@orange.com' => 'Maintenance OVT'))
            ->setContentType("text/html")                   
                ;
                $this->mailer->send($message); 
                /**** END *********/
            }
        }
        $this->update();

        
    }





    /********* ORGANISATION ***********************/

    public  function getAllOrganisations(){
		return $this->em->getRepository("OVTGeneralBundle:Organisation")->findAll();
    }

    public  function updateOrganisation(Organisation $org){
         $this->em->flush();
    }

	public  function createOrganisation(Organisation $org){
        $this->em->persist($org);
        $this->em->flush();
	}

	public  function getOrganisationById($orgID){
        return $this->em->getRepository('OVTGeneralBundle:Organisation')->find($orgID);
	}
 

    public  function deleteOrganisationById( $orgID){
       $org=$this->getOrganisationById($orgID);
        $this->em->remove($org);
    }

	public  function getOrganisationsByType($type){
		return $this->em->getRepository("OVTGeneralBundle:Organisation")->findBy(array("type"=>$type));
	}

    public function getOrgAdminById($id){

        return $this->getUserById();
    }

    public function getAdminsUserByOrgId($orgID){
       $users=$this->em->getRepository('OVTGeneralBundle:Organisation')->find($orgID)->getAdmins();
       return $users;
    }


    /********** USER *************************/

    public function updateUser(User $u){

    }

    public function createUser(User $u){
        $this->em->persist($u);
        $this->em->flush();
    }

    public function deleteUserById($userID){
        $u=$this->getUserById($userID);
        $this->em->remove($u);
        $this->em->flush();
    }


   public function getUserById($userID){
         return $this->em->getRepository('OVTUserBundle:User')->find($userID);
    }

    public  function getAllUsers(){
        $all= $this->em->getRepository('OVTUserBundle:User')->findAll();
        $users = array();
        foreach ($all as $u) {
            if(!in_array("ROLE_SUPER_ADMIN", $u->getRoles())) 
                $users[]=$u;
        }
        return $users;
    }

    public  function getAllAdmins(){
        $all= $this->em->getRepository('OVTUserBundle:User')->findAll();
        $users = array();
        foreach ($all as $u) {
            $roles= $u->getRoles();
            if( in_array("ROLE_SUPER_ADMIN",$roles) || 
                in_array("ROLE_COM_CLIENT",$roles)  || 
                in_array("ROLE_PROVIDER_ADMIN",$roles)) 
                $users[]=$u;
        }
        return $users;
    }

    public  function getProviderAdmins(){
        $all= $this->em->getRepository('OVTUserBundle:User')->findAll();
        $users = array();
        foreach ($all as $u) {
            $roles= $u->getRoles();
            if( in_array("ROLE_PROVIDER_ADMIN",$roles)) 
                $users[]=$u;
        }
        return $users;
    }


    public  function getClientAdmins(){
        $all= $this->em->getRepository('OVTUserBundle:User')->findAll();
        $users = array();
        foreach ($all as $u) {
            $roles= $u->getRoles();
            if( in_array("ROLE_COM_CLIENT",$roles)) 
                $users[]=$u;
        }
        return $users;
    }

    public  function getSuperAdmins(){
        $all= $this->em->getRepository('OVTUserBundle:User')->findAll();
        $users = array();
        foreach ($all as $u) {
            $roles= $u->getRoles();
            if( in_array("ROLE_SUPER_ADMIN",$roles)) 
                $users[]=$u;
        }
        return $users;
    }

    public function newClientWorkerFromUser($user){
        switch ($user->getType()) {
            case 'Administrateur Client':
                $client = new Client();
                $client->setUser($user);  
                $this->em->persist($client);
                break;
            
            case 'Administrateur Prestataire' : 
                $worker = new Worker();
                $worker->setUser($user);  
                $this->em->persist($worker);
                break;
        }

        $this->em->flush();
    }


    /********* NOTIFICATIONS ******************/

    public function createNotification(Notification $n){
        $this->em->persist($n);
        $this->em->flush();
        return $n->getId();
    }

    public function getNotificationsByUser($user){
        $allNotifs = $this->em->getRepository('OVTGeneralBundle:Notification')->findAll();
        $notifs = array();
        $compteur = 0;
        foreach ($allNotifs as $notif) {
            if($compteur >= 5)
                break;
            if($notif->getUser()->contains($user)){
                $compteur++;
                $notifs[]= $notif;
            }        
           
        }
        return $notifs;       
    }


    /********* TEST *************************/

    public  function test(User $u){
        $this->em->persist($u);
        $this->em->flush();
    }
    public  function update(){
         $this->em->flush();
    }

   
}
