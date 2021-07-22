<?php

namespace Tests\Unit\Models;

use IBill\Config;
use IBill\IBillClient;
use IBill\Models\ApiConfig;
use PHPUnit\Framework\TestCase;

class ApiConfigTest extends TestCase
{
    /** @test */
    public function can_set_the_environment()
    {
        $model = new ApiConfig(['environment' => 'sandbox']);
        $this->assertEquals('sandbox', $model->getEnvironment());
    }

    /** @test */
    public function can_set_the_access_token()
    {
        $model = new ApiConfig(['access_token' => 'access-token']);
        $this->assertEquals('access-token', $model->getAccessToken());
    }

    /** @test */
    public function can_not_set_the_api_url()
    {
        $model = new ApiConfig(['base_url' => 'http://example.com']);
        $this->assertEquals(Config::API_URL, $model->getBaseUrl());
    }

    /** @test */
    public function can_set_account_id()
    {
        $model = new ApiConfig(['account_id' => 1234]);
        $this->assertEquals(1234, $model->getAccountId());
    }
}
