<?php

namespace OVT\Services\VelotypieBundle\Entity; 

use OVT\GeneralBundle\Entity\Session ;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;

class ApiHelper  
{
    
    protected $em;
    protected $doctrine;

    public function __construct(EntityManager $em){
        $this->em=$em;
    }

    public function update(){
        $this->em->flush();
    }
    public function create($foo){
        $this->em->persist($foo);
        $this->em->flush();
    }
    /************** SESSION  ************************************/

    public  function getSessionByLink($link){
        return $this->em->getRepository("OVTGeneralBundle:Session")->findOneBy(array('link'=>$link));
    }

    public  function getSessionById($id){
        return $this->em->getRepository("OVTGeneralBundle:Session")->find($id);
    }

    /**************** USER ************************************/
    public  function getUserById($id){
        return $this->em->getRepository("OVTUserBundle:User")->find($id);
    }
   

   /*************** MESSAGE   ********************************/
   public function getChatBySession($sessionID){
        $criteria= array("session"=>$sessionID);
        return $this->em->getRepository("OVTGeneralBundle:Message")->findBy($criteria);
   }




}
