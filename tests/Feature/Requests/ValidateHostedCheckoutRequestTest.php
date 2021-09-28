<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\ValidateHostedCheckout;
use Tests\TestCase;

class ValidateHostedCheckoutRequestTest extends TestCase
{
    /** @test */
    public function validate_payment_id_error()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
            $response = $client->validateHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }

    /** @test */
    /*public function validate_payment_id_success()
    {
        $client = $this->validIBillClient();

        try {

            // create hosted
            // charge payment
            // validate

            $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
            $response = $client->validateHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }*/
}
