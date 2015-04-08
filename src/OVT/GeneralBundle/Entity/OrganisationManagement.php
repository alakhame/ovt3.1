<?php

namespace OVT\GeneralBundle\Entity;
use OVT\GeneralBundle\Entity\Organisation as Organisation;

interface OrganisationManagement{

	public  function updateOrganisation(OrganisationM $o);
	public  function createOrganisation(OrganisationM $o);
	public  function deleteOrganisationById($orgID); 
	public  function getOrganisationsByType($type); 
	
}