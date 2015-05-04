<?php

namespace OVT\FrontEnd\ProviderBundle\Entity;  
use OVT\UserBundle\Entity\User ;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;
use OVT\GeneralBundle\Entity\Providerservicegroup;

class ProviderAdmin extends User  
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
    public function getWaitingSessions(User $user){
        $worker=$this->getWorkerFromUser($user);
        $criteria = array('worker' => $worker,"state"=>"TO_CONFIRM");
        $waitingSessions=$this->em->getRepository("OVTGeneralBundle:Session")->findBy($criteria);
       
        return count($waitingSessions);
    }

    public function getSessionsToAffect(){
        $allSessions=$this->em->getRepository("OVTGeneralBundle:Session")->findAll();
        $sessions=array();
        foreach ($allSessions as $s) {
               if($s->getWorker()==null )
                $sessions[]=$s;
        }
        return $sessions;
    }

    public function retrieveSessionsByState($user){
        $worker=$this->getWorkerFromUser($user);
        $criteria = array('worker' => $worker);
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
    
    public function getSessionById($id){
        return $this->em->getRepository('OVTGeneralBundle:Session')->find($id);
    }

    public function getSessionsByWorkerByState($user,$state){
        $worker=$this->getWorkerFromUser( $user);
        $criteria  = array('worker' =>$worker,'state'=>$state );
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    public function getSessionsByWorker(User $user){
        $worker=$this->getWorkerFromUser( $user);
        $criteria  = array('worker' =>$worker);
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    public function getSessionsByWorkerId($idWorker){
        $worker=$this->getWorkerById($idWorker);
        $criteria  = array('worker' =>$worker);
        return $this->em->getRepository('OVTGeneralBundle:Session')->findBy($criteria);
    }

    /************ WORKER ***************************/


    public function getWorkerById($id){
        return $this->em->getRepository('OVTGeneralBundle:Worker')->find($id);
    }

    public function getWorkerFromUser(User $user){
        $criteria = array('user' => $user);
        return $this->em->getRepository('OVTGeneralBundle:Worker')->findOneBy($criteria);
    }
    public function getWorkerFromUserID($uID){
        $user=$this->em->getRepository('OVTUserBundle:User')->find($uID);
        return $this->getWorkerFromUser($user);
    }

    public function retriveWorkersFromAdmin($admin){
        $org=$admin->getOrganisation();
        $all=$this->em->getRepository('OVTUserBundle:User')->findBy(array('organisation'=>$org));
        $worker=array();
        foreach ($all as $w) {
            if(in_array("ROLE_WORKER",$w->getRoles()) && $w->getType="Employé Prestataire")
                $workers[]=$w;
        } 

        return $workers;
    }

    public function createWorker($worker){
        $this->em->persist($worker);
        $this->em->flush();
    }

    public function deleteWorkerById($workerID){
        $worker=$this->getWorkerById($workerID);
        $user=$worker->getUser();
        $this->em->remove($worker);
        $this->em->remove($user);
        $this->em->flush();
    }




    /*********** GROUPS  *****************************/

    public function retrieveGroups($admin){
        $criteria = array('organisation'=>$admin->getOrganisation());
        return $this->em->getRepository('OVTGeneralBundle:Providerservicegroup')->findBy($criteria);
    }

    public function getGroupFromId($id){
        return $this->em->getRepository('OVTGeneralBundle:Providerservicegroup')->find($id);
    }

    public function getGroupById($id){
        return $this->em->getRepository('OVTGeneralBundle:Providerservicegroup')->find($id);
    }

    public function createGroup(Providerservicegroup $group){
        $this->em->persist($group);
        $this->em->flush();
    }
    
    public function deleteGroupById($groupID){
        $group=$this->getGroupById($groupID);
       $this->em->remove($group);
        $this->em->flush();
    }
   
}
