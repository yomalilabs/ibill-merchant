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
        $client = new IBill([
            'account_id' => 1234,
            'access_token' => 'access-token',
        ]);

        try {
            $checkout = new ValidateHostedCheckout(['payment_id' => 'faulty-payment']);
            $response = $client->validateHostedCheckout($checkout);
        } catch (ApiException $e) {
            $this->assertNotNull($e->error);
        }
    }
}
