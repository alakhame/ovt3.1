<?php 
// OVT\UserBundle\Tests\EntittyTest.php
namespace OVT\UserBundle\Tests;

use OVT\UserBundle\Entity\User;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testGetFullname()
    {
        $user = new User();
        $user->setFirstName("Khadim");
        $user->setLastName("Ndiaye");
        $result = $user->getCompleteName();
 
        $this->assertEquals("Khadim Ndiaye", $result);
    }
}

