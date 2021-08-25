<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use Tests\TestCase;

class CaptureAuthorizedPaymentRequestTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'amount' => 1025,
            'authorized_payment_id' => 'AMB8PUM9HPLZ7NJ',
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
            $checkout = new AuthorizePayment(
                [
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
                ]
            );
            $response = $client->authorizePayment($checkout);

            $checkout = new CaptureAuthorizedPayment($this->validParams([
                'authorized_payment_id' => $response->id
            ]));
            $response = $client->captureAuthorizedPayment($checkout);
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
            'access_token' => 'faulty-token'
        ]);

        try {



            $checkout = new CaptureAuthorizedPayment(
                $this->validParams([
                    'authorized_payment_id' => 'faulty',
                ])
            );
            $response = $client->captureAuthorizedPayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
