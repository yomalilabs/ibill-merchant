<?php

use IBill\Config;
use IBill\IBillClient;
use IBill\Models\ApiConfig;
use PHPUnit\Framework\TestCase;

class ApiConfigTest extends TestCase
{
    /** @test */
    public function can_set_the_environment()
    {
        $config = new ApiConfig([
            'environment' => 'sandbox',
        ]);

        $this->assertEquals('sandbox', $config->environment);
    }

    /** @test */
    public function can_set_the_access_token()
    {
        $config = new ApiConfig([
            'accessToken' => 'access-token',
        ]);

        $this->assertEquals('access-token', $config->accessToken);
    }

    /** @test */
    public function can_not_set_the_api_url()
    {
        $config = new ApiConfig([
            'baseUrl' => 'http://example.com',
        ]);

        $this->assertEquals(Config::API_URL, $config->baseUrl);
    }
}
