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

    public function createEntity($e){
        $this->em->persist($e);
        $this->em->flush();
    }

    public function update(){
       $this->em->flush();
    }

    /************ SESSIONOFFER ************************/
    public function getSessionOffersBySession($session){
        $criteria=array("session"=>$session,"decision"=>1);
        return $this->em->getRepository('OVTGeneralBundle:SessionOffer')->findBy($criteria);
    }

    public function getSessionOfferById($id){
        return $this->em->getRepository('OVTGeneralBundle:SessionOffer')->find($id);
    }

    public function cleanOffers($session){
        $offers=$this->getSessionOffersBySession($session);
        foreach ($offers as $o) {
            $this->em->remove($o);
        }
        $this->update();
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

    public function getSessionsByUserId($idUser){
        $client=$this->getClientFromUserID($idUser);
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

    public function getSessionsByClientByStateRisp($user,$state){
        $sessions=$this->getSessionsByClientByState($user,$state);
        $toReturn = array();
        foreach ($sessions as $s) {
            if($s->getOrganisation()->getName()=='RISP' && $s->getClient()->getOrganisation()->getName()!='ORANGE'){
                continue;
            }else{  
                $toReturn['']=$s;
            }
        }
        return $toReturn;
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

    public function retriveUserClientsFromAdmin($admin){
        $org=$admin->getOrganisation();
        $all=$this->em->getRepository('OVTUserBundle:User')->findBy(array('organisation'=>$org));
        $clients=array();
        foreach ($all as $c) {
            if(in_array("ROLE_CLIENT",$c->getRoles())  )
                $clients[]=$c;
        } 

        return $clients;
    }

    public function retriveClientsFromAdmin($admin){
    $org=$admin->getOrganisation();
    $all=$this->em->getRepository('OVTGeneralBundle:Client')->findAll();
    $clients=array();
    foreach ($all as $c) {
        if(/*in_array("ROLE_CLIENT",$c->getUser()->getRoles()) && */ $c->getUser()->getOrganisation()==$org )
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

    public function getAllOrgsByServiceId($serviceId,$orgClientId){
        $service = $this->getServiceById($serviceId);
        $orgClient = $this->getOrganisationById($orgClientId);
        $allOrgs = $this->em->getRepository('OVTGeneralBundle:Organisation')->findByIsActive(1);
        $result = array();
        foreach ($allOrgs as $org) {
            if($this->existCollaboration($service,$org,$orgClient) > 0)
                $result[]=$org;
        }
        return $result;
    }

     public function getAllOrgsByServiceIdBis($serviceId){
        $service = $this->getServiceById($serviceId);
        $allOrgs = $this->em->getRepository('OVTGeneralBundle:Organisation')->findByIsActive(1);
        $result = array();
        foreach ($allOrgs as $org) {
            if($org->getService()->contains($service) && $org->getType()=='provider')
                $result[]=$org;
        }
        return $result;
    }

    public function getUniqueOrgsByServices($services){
        $result=array();
        foreach ($services as $s) {
             $allOrgs=$this->getAllOrgsByServiceIdBis($s->getId());
             foreach ($allOrgs as $o) {
                if(!in_array($o, $result))
                    $result[]=$o;
             }
        }

        return $result;
    }

    /************** COLLABORATION ***************************/
     public function getCollabsByProviderId($idP,$idC){
        $provider=$this->getOrganisationById($idP);
        $client=$this->getOrganisationById($idC);
        $criteria = array('provider'=>$provider,'orgClient'=>$client);
        return $this->em->getRepository('OVTGeneralBundle:Collaboration')->findBy($criteria);

    }

    public function getCollaborationById($id){
        return $this->em->getRepository('OVTGeneralBundle:Collaboration')->find($id);
    }

    public function removeCollabById($id){
        $c=$this->getCollaborationById($id);
        $this->em->remove($c);
        $this->em->flush();
    }
    
    public function createCollaboration($c){
        $this->em->persist($c);
        $this->em->flush();
    }
     
    public function existCollaboration($service,$provider,$orgClient){
        $criteria = array('service'=>$service,'provider'=>$provider,'orgClient'=>$orgClient);
        $result =  $this->em->getRepository('OVTGeneralBundle:Collaboration')->findBy($criteria);
        return count($result);
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
