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
    /** @test */
    public function do_authorize_payment_request()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new AuthorizePayment($this->validParamsForAuthOrChargeModel());
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
    public function validate_account_id()
    {
        $client = new IBill($this->validIBillClientParams(["account_id" => 12]));
        try {
            $checkout = new AuthorizePayment(
                $this->validParamsForAuthOrChargeModel()
            );
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }

    /** @test */
    public function validate_card_number()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new AuthorizePayment(
                $this->validParamsForAuthOrChargeModel([
                    'card_number' => 'faulty',
                ])
            );
            $response = $client->authorizePayment($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->message);
        }
    }
}
