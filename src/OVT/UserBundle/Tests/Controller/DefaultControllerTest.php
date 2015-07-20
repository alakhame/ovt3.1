<?php

namespace OVT\UserBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UserControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'http://vepi-ovt.epi.orange-labs.fr/');

        $this->assertTrue( $crawler->filter('html:contains("w")')->count() > 0 );
    }
}
