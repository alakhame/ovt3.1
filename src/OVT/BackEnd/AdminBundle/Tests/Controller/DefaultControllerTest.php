<?php

namespace OVT\BackEnd\AdminBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'http://vepi-ovt.epi.orange-labs.fr/');

        $this->assertTrue( $crawler->filter('html:contains("e")')->count() > 0 );
    }
}
