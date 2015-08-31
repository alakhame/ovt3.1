<?php

namespace OVT\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient(); 
        $crawler = $client->request('GET', 'http://vepi-ovt.epi.orange-labs.fr/');
        $link = $crawler->filter('a:contains("Se connecter")')->eq(0)->link();
        $crawler = $client->click($link);

       	$crawler = $client->request(
		    'POST',
		    'http://vepi-ovt.epi.orange-labs.fr/login_check',
		    array("_username"=>"dummy@mail.com","_password"=>"dummy_pass"),
		    array(),
		    array(),
		    null,
		    true
		); 

		$this->assertTrue($crawler->filter('html:contains("Connexion")')->count() > 0 );
      
        
    }
}
