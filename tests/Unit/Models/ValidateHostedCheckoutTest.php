<?php

namespace Tests\Unit\Models;

use IBill\Models\ValidateHostedCheckout;
use PHPUnit\Framework\TestCase;

class ValidateHostedCheckoutTest extends TestCase
{
    /** @test */
    public function can_set_payment_id()
    {
        $config = new ValidateHostedCheckout([
            'payment_id' => '123456789',
        ]);

        $this->assertEquals('123456789', $config->payment_id);
    }
}
