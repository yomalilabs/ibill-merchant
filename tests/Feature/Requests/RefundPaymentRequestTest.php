<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Models\AuthorizePayment;
use IBill\Models\ChargePayment;
use IBill\Models\RefundPayment;
use Tests\TestCase;

class RefundPaymentRequestTest extends TestCase
{
    /** @test */
    public function create_checkout()
    {
        $client = new IBill([
            'account_id' => 6509,
            'access_token' => 'access-token',
        ]);

        try {
            $model = new ChargePayment($this->validParamsForAuthOrChargeModel());
            $response = $client->chargePayment($model);

            $checkout = new RefundPayment([
                'amount' => 1025,
                'payment_id' => $response->id,
            ]);
            $response = $client->refundPayment($checkout);
        } catch (ApiException $e) {
            // var_dump($e->message);
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
            $checkout = new RefundPayment(
                [
                    'amount' => 1025,
                    'payment_id' => 'faulty',
                ]
            );
            $response = $client->refundPayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
