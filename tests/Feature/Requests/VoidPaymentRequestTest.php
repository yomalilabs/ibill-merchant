<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Models\ChargePayment;
use IBill\Models\VoidPayment;
use Tests\TestCase;

class VoidPaymentRequestTest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $client = new IBill([
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $response = $client->chargePayment($this->validChargePaymentModel());

            $checkout = new VoidPayment([
                'payment_id' => $response->id,
            ]);
            $response = $client->voidPayment($checkout);
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
            $checkout = new VoidPayment(
                [
                    'payment_id' => 'faulty',
                ]
            );
            $response = $client->voidPayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
