<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\HostedCheckout;
use Tests\TestCase;

class HostedCheckoutRequest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $client = new IBillClient([
            'accessToken' => 'access-token'
        ]);

        try {
            $checkout = new HostedCheckout(['amount' => 1000]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
        }

        // if ($response->isError()) {

        // }

        // var_dump($response);
        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->data->url);
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
