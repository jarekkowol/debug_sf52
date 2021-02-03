<?php

namespace App;

use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationTest extends WebTestCase
{
    protected KernelBrowser $client;

    public function setUp(): void
    {
        $this->client = static::createClient([], ['CONTENT_TYPE' => 'application/json']);
    }

    public function testRegister()
    {
        $this->client->request('GET', '/registration');
        $this->assertResponseIsSuccessful();
       
        $this->assertEmailCount(1);
        $this->assertEmailIsQueued($this->getMailerEvent(0));

        $email = $this->getMailerMessage(0);
        $this->assertEmailHeaderSame($email, 'To', "test_to@test.pl");
        $this->assertEmailTextBodyContains($email, 'Text');
        $this->assertEmailHtmlBodyContains($email, 'Html');
    }
}