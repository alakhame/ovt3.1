<?php

namespace OVT\FrontEnd\ProviderBundle\Entity;  
use OVT\UserBundle\Entity\User ;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;

class ProviderAdmin extends User  
{
    
    protected $em;
    protected $doctrine;

    public function __construct(EntityManager $em){
        $this->em=$em;
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
    

    /************ WORKER ***************************/

    public function getWorkerFromUser(User $user){
        $criteria = array('user' => $user);
        return $this->em->getRepository('OVTGeneralBundle:Worker')->findBy($criteria);
    }

    public function retriveWorkersFromAdmin($admin){
        $org=$admin->getOrganisation();
        $criteria = array('organisation'=>$org,'type'=>"Worker");
        return $this->em->getRepository('OVTUserBundle:User')->findBy($criteria);
    }

  
   
}
