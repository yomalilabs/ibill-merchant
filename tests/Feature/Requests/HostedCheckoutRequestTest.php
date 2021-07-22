<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBillClient;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use Tests\TestCase;

class HostedCheckoutRequestTest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $client = new IBillClient([
            // 'environment' => 'sandbox',
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new HostedCheckout([
                'amount' => 1000,
                'reference' => 123456789,
                'products' => [
                    new Product([
                        'quantity' => 1,
                        'codename' => 'product1',
                    ]),
                    new Product([
                        'quantity' => 2,
                        'codename' => 'product2',
                    ]),
                ],
            ]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
            die($e->error);
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->url);
        $this->assertEquals(5, strpos($response->url, '://checkout.ibill.com?token='));
    }

    /** @test */
    public function validate_access_token()
    {
        $client = new IBillClient([
            'account_id' => 6509,
            'access_token' => 'faulty-token'
        ]);

        try {
            $checkout = new HostedCheckout(['amount' => 1000]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }

    /** @test */
    public function create_checkout_with_products()
    {
        $client = new IBillClient([
            // 'environment' => 'sandbox',
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new HostedCheckout([
                'amount' => 1000,
                'reference' => 123456789,
                'products' => [
                    new Product([
                        'quantity' => 1,
                        'codename' => 'product1',
                    ]),
                    new Product([
                        'quantity' => 2,
                        'codename' => 'product1',
                    ]),
                ],
            ]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->url);
        $this->assertEquals(5, strpos($response->url, '://checkout.ibill.com?token='));
    }
}
