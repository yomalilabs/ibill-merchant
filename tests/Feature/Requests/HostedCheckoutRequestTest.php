<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use Tests\TestCase;

class HostedCheckoutRequestTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'amount' => 2000, // in cents
            'reference' => '123456789',
            'cancel_url' => 'http://merchant.ibill.test/cancel',
            'success_url' => 'http://merchant.ibill.test/success'

        ], $overrides);
    }

    /** @test */
    public function create_checkout()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new HostedCheckout(
                $this->validParams([
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
                ])
            );
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->url);
        $this->assertEquals(5, strpos($response->url, '://checkout.ibill.com?token='));
    }

    /** @test */
    public function validate_access_token()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new HostedCheckout(['amount' => 1000]);
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }

    /** @test */
    public function create_checkout_with_products_not_added_in_ibill()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new HostedCheckout(
                $this->validParams([
                    'products' => [
                        new Product([
                            'quantity' => 1,
                            'amount' => 10000,
                        ]),
                        new Product([
                            'quantity' => 1,
                            'amount' => 20000,
                        ]),
                    ],
                ])
            );
            $response = $client->createHostedCheckout($checkout);
        } catch (ApiException $e) {
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->url);
        $this->assertEquals(5, strpos($response->url, '://checkout.ibill.com?token='));
    }
}
