<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizePayment;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use Tests\TestCase;

class AuthorizePaymentRequestTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'info@example.com',
            'address' => '1234 Fake Address',
            'zip' => 12345,

            'amount' => 1025,
            'card_number' => 6011111111111117,
            'card_cvv' => 123,
            'card_expiry_month' => 10,
            'card_expiry_year' => 2025,
        ], $overrides);
    }

    /** @test */
    public function create_checkout()
    {
        $client = new IBill([
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new AuthorizePayment($this->validParams());
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
        }

        $this->assertEquals(1, $response->success);
        $this->assertNull($response->error);
        $this->assertNotNull($response->id);
        $this->assertNotNull($response->message);
        $this->assertEquals('Approved and Completed', $response->message);
    }

    /** @test */
    public function validate_card_number()
    {
        $client = new IBill([
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new AuthorizePayment(
                $this->validParams([
                    'card_number' => 'faulty',
                ])
            );
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}