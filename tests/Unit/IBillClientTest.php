<?php

use IBill\Config;
use IBill\IBillClient;
use PHPUnit\Framework\TestCase;

class IBillClientTest extends TestCase
{
    /** @test */
    public function can_get_config()
    {
        $client = new IBillClient();
        $this->assertNotNull($client->getConfig());
    }

    /** @test */
    public function can_set_config_options()
    {
        $config = new IBillClient([
            'environment' => 'sandbox',
        ]);

        $this->assertEquals('sandbox', $config->getConfig()->environment);
    }
}
