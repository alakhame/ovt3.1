<?php

namespace OVT\GeneralBundle\Entity;

interface SuperAdminActions{

	public  function desactivateAccount(int $userID);
	public  function activateAccount(int $userID);
}