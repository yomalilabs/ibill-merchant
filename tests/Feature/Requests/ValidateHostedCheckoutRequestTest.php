<?php

namespace Tests\Feature\Requests;

use IBill\Exceptions\ApiException;
use IBill\IBill;
use IBill\Models\ValidateHostedCheckout;
use Tests\TestCase;

class ValidateHostedCheckoutRequestTest extends TestCase
{
    /** @test */
    public function validate_payment_id()
    {
        $client = $this->validIBillClient();

        try {
            $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
            $response = $client->validateHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }
}
