<?php

namespace OVT\GeneralBundle\Entity;
use OVT\GeneralBundle\Entity\Service as Service;

interface ServiceManagement{

	public  function updateService(Service $s);
	public  function createService(Service $s);
	public  function deleteServiceById($serviceID);

}