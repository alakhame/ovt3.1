<?php

namespace OVT\BackEnd\AdminBundle\Entity;
use OVT\UserBundle\Entity\User ;
use OVT\GeneralBundle\Entity\ServiceManagement;
use OVT\GeneralBundle\Entity\Service ;
use Doctrine\ORM\EntityManager;
use Doctrine\Bundle\DoctrineBundle\Registry as Registry;

class SuperAdmin extends User implements ServiceManagement, 
{
    
    protected $em;
    protected $doctrine;

    public function __construct(EntityManager $em){
        $this->em=$em;
    }

    
    /************ SERVICE ***************************/

    public  function updateService( Service $s){

    }

	public  function createService( Service $service){
		$this->em->persist($service);
        $this->em->flush();
	}

	public  function deleteServiceById( $serviceID){

	}

	public  function getServiceById($id){
		return $this->em->getRepository('OVTGeneralBundle:Service')->find($id);
    }

    public  function getAllServices(){
		return $this->em->getRepository("OVTGeneralBundle:Service")->findAll();
    }



    /********* ORGANISATION ***********************/

    public  function getAllOrganisations(){
		return $this->em->getRepository("OVTGeneralBundle:Organisation")->findAll();
    }

    public  function updateOrganisation(OrganisationM $org){

    }

	public  function createOrganisation(OrganisationM $org){

	}

	public  function deleteOrganisationById( $orgID){

	}

	public  function getOrganisationsByType($type){
		return $this->em->getRepository("OVTGeneralBundle:Organisation")->findBy(array("type"=>$type));
	}
   
}
