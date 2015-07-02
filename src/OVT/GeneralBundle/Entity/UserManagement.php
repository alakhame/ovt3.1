<?php

namespace OVT\GeneralBundle\Entity;
use OVT\UserBundle\Entity\User as User;

interface UserManagement{

	public function updateUser(User $u);
	public function createUser(User $u);
	public function deleteUserById($userID);
	public function getUserById($userID) ;

}

