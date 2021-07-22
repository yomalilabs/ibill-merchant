<?php

namespace Tests\Unit;

use IBill\Config;
use IBill\IBillClient;
use PHPUnit\Framework\TestCase;

class IBillClientTest extends TestCase
{
    /** @test */
    public function can_get_config()
    {
        $client = new IBillClient([
            'account_id' => 1234,
            'access_token' => 'access-token',
        ]);
        $this->assertNotNull($client->getConfig());
    }

    /** @test */
    public function can_set_config_options()
    {
        $config = new IBillClient([
            'account_id' => 1234,
            'access_token' => 'access-token',
            'environment' => 'sandbox',
        ]);

        $this->assertEquals('sandbox', $config->getConfig()->getEnvironment());
    }
}
