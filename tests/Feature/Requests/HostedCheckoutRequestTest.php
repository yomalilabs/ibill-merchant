<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\HostedCheckout;
use Tests\TestCase;

class HostedCheckoutRequestTest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $client = new IBillClient([
            // 'environment' => 'sandbox',
            'accessToken' => 'access-token',
        ]);

        try {
            $checkout = new HostedCheckout(['amount' => 1000]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
            // var_dump($e->error);
            // die('');
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->url);
    }

    /** @test */
    public function validate_access_token()
    {
        $client = new IBillClient([
            'accessToken' => 'faulty-token'
        ]);

        try {
            $checkout = new HostedCheckout(['amount' => 1000]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }
}
