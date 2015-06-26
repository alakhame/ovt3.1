<?php

namespace OVT\GeneralBundle\Entity;
use OVT\GeneralBundle\Entity\Client as Client;
use OVT\UserBundle\Entity\User as User;

class AdminClient  extends Client  implements UserManagement
{
  
    public function updateUser(User $u){

    }
	
	public function createUser(User $u){

	}

	public function deleteUserById( $userID){

	}

	public function getUser(){

	}
	public function getUserById($userID){
		
	}
}

