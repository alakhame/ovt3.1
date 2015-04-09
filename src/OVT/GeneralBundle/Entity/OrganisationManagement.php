<?php

namespace OVT\GeneralBundle\Entity;
use OVT\GeneralBundle\Entity\Organisation as Organisation;

interface OrganisationManagement{

	public  function updateOrganisation(Organisation $o);
	public  function createOrganisation(Organisation $o);
	public  function getOrganisationById($orgID); 
	public  function deleteOrganisationById($orgID); 
	public  function getOrganisationsByType($type); 
	
}