<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Models\ChargePayment;
use IBill\Models\VoidPayment;
use Tests\TestCase;

class LookupPaymentRequestTest extends TestCase
{
    /** @test */
    public function do_lookup_request()
    {
        $client = $this->validIBillClient();

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
    public function validate_payment_id()
    {
        $client = $this->validIBillClient();

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
