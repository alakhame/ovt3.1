<?php

namespace OVT\FrontEnd\ClientBundle\Entity;  
use OVT\UserBundle\Entity\User ;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;
use OVT\GeneralBundle\Entity\Document ;
 
class ClientAdmin extends User  
{
    
    protected $em;
    protected $doctrine;

    public function __construct(EntityManager $em){
        $this->em=$em;
    }

    public function update(){
       $this->em->flush();
    }

    /************ SESSIONS ************************/
    
    public function getSessionById($id){
        return $this->em->getRepository('OVTGeneralBundle:Session')->find($id);
    }

   
    public function getSessionsByClient(User $user){
        $client=$this->getClientFromUser( $user);
        $criteria  = array('client' =>$client);
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    public function getSessionsByClientId($idClient){
        $client=$this->getClientById($idClient);
        $criteria  = array('client' =>$client);
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    public function createSession($session){
        $doc = new Document();
        $doc->setCreationDate(new \DateTime('now'));
        $doc->setLastModificationDate(new \DateTime('now'));
        
        $session->setDocument($doc);
        
        $this->em->persist($session);
        $this->em->persist($doc);
        $this->em->flush();
    }

    public function getSessionsByClientByState($user,$state){
        $client=$this->getClientFromUser( $user);
        $criteria  = array('client' =>$client,'state'=>$state );
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    public function retrieveSessionsByState($user){
        $client=$this->getClientFromUser( $user);
        $criteria = array('client' => $client);
        $allSessions=$this->em->getRepository("OVTGeneralBundle:Session")->findBy($criteria);
        $toConfirm=$accepted=$canceled=$refused=array();
        foreach ($allSessions as $s) {
            switch($s->getState()){
                case "ACCEPTED": $accepted[]=$s; break;
                case "TO_CONFIRM":$toConfirm[]=$s; break;
                case "CANCELED": $canceled[]=$s; break;
                case "REFUSED": $refused[]=$s; break;
                default: break;
            }
        }
        return array("ACCEPTED"=>$accepted,"TO_CONFIRM"=>$toConfirm,"CANCELED"=>$canceled,"REFUSED"=>$refused);

    }


    /************ SERVICE ************************/
    
    public function getServiceById($id){
        return $this->em->getRepository('OVTGeneralBundle:Service')->find($id);
    }



    /************ Client ***************************/


    public function getClientById($id){
        return $this->em->getRepository('OVTGeneralBundle:Client')->find($id);
    }

    public function getClientFromUser(User $user){
        $criteria = array('user' => $user);
        return $this->em->getRepository('OVTGeneralBundle:Client')->findOneBy($criteria);
    }
    public function getClientFromUserID($uID){
        $user=$this->em->getRepository('OVTUserBundle:User')->find($uID);
        return $this->getClientFromUser($user);
    }

    public function retriveClientsFromAdmin($admin){
        $org=$admin->getOrganisation();
        $all=$this->em->getRepository('OVTUserBundle:User')->findBy(array('organisation'=>$org));
        $clients=array();
        foreach ($all as $c) {
            if(in_array("ROLE_CLIENT",$c->getRoles()) && $c->getType="Client")
                $clients[]=$c;
        } 

        return $clients;
    }

    public function createClient($client){
        $this->em->persist($client);
        $this->em->flush();
    }

    public function deleteClientById($clientID){
        $client=$this->getClientById($clientID);
        $user=$client->getUser();
        $this->em->remove($client);
        $this->em->remove($user);
        $this->em->flush();
    }

     


    /*********** ORGANISATION *****************************/
    
    public function getClientOrgGroupByUser($user) {
        $client = $this->getClientFromUser($user);
        $group=$client->getGroup();
        return $group->getOrganisation();
    }

    public function getOrganisationById($id) {
        return $this->em->getRepository('OVTGeneralBundle:Organisation')->find($id);
    }
     
   
   /*************** GROUPS *********************************/

    public function retrieveGroups($admin){
        $criteria = array('orgClientOwner'=>$admin->getOrganisation());
        return $this->em->getRepository('OVTGeneralBundle:Clientservicegroup')->findBy($criteria);
    }

    public function getGroupById($id){
        return $this->em->getRepository('OVTGeneralBundle:Clientservicegroup')->find($id);
    }

    public function deleteGroupById($groupID){
        $group=$this->getGroupById($groupID);
        $this->em->remove($group);
        $this->em->flush();
    }

    public function create($foo){
        $this->em->persist($foo);
        $this->em->flush();
    }

    public function getAllPrestas(){
        $criteria=array("type"=>"provider");
        return $this->em->getRepository('OVTGeneralBundle:Organisation')->findBy($criteria);
    }
}
