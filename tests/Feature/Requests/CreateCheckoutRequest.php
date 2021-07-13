<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\Checkout;
use Tests\TestCase;

class CreateCheckoutRequest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $ibill = new IBillClient([
            'accessToken' => 'access-token'
        ]);

        try {
            $checkout = new Checkout([
                'amount' => 1000,
            ]);

            $response = $ibill->createCheckout($checkout);
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
    public function validate_private_key()
    {
        $client = new \GuzzleHttp\Client();
        $headers = ['not-valid' => 'private-key-123', 'Accept' => 'application/json'];
        $response = $client->request('POST', constant("APP_URL") . '/session/create', ['headers' => $headers]);

        $body = json_decode($response->getBody()->getContents());

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals(0, $body->success);
        $this->assertEquals('application/json', $response->getHeaderLine('content-type'));
        $this->assertNotNull($body->error);

        // do assert into the database if the token is linked to the business
    }
}
