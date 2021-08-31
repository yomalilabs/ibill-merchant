<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\ChargePayment;
use Tests\TestCase;

class ChargePaymentRequestTest extends TestCase
{
    /** @test */
    public function create_charge_payment()
    {
        $client = new IBill([
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new ChargePayment($this->validParamsForAuthOrChargeModel());
            $response = $client->chargePayment($checkout);
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
            $checkout = new ChargePayment(
                $this->validParamsForAuthOrChargeModel([
                    'card_number' => 'faulty',
                ])
            );
            $response = $client->chargePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
