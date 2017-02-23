<?php

namespace EniBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StaffControllerTest extends WebTestCase
{
    public function testThemeview()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/themeview');
    }

}
