<?php

namespace Tests\Unit;

use IBill\Config;
use IBill\IBill;
use PHPUnit\Framework\TestCase;

class IBillTest extends TestCase
{
    /** @test */
    public function can_get_config()
    {
        $client = new IBill([
            'account_id' => 1234,
            'access_token' => 'access-token',
        ]);
        $this->assertNotNull($client->getConfig());
    }

    /** @test */
    public function can_set_config_options()
    {
        $config = new IBill([
            'account_id' => 1234,
            'access_token' => 'access-token',
            'environment' => 'sandbox',
        ]);

        $this->assertEquals('sandbox', $config->getConfig()->getEnvironment());
    }
}
