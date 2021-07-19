<?php

namespace Tests\Unit\Models;

use IBill\Models\HostedCheckout;
use PHPUnit\Framework\TestCase;

class HostedCheckoutTest extends TestCase
{
    /** @test */
    public function can_set_reference()
    {
        $config = new HostedCheckout([
            'reference' => 'reference',
        ]);

        $this->assertEquals('reference', $config->reference);
    }

    /** @test */
    public function can_set_amount()
    {
        $config = new HostedCheckout([
            'amount' => 5000,
        ]);

        $this->assertEquals(5000, $config->amount);
    }

    /** @test */
    public function can_set_success_url()
    {
        $config = new HostedCheckout([
            'success_url' => 'http://success.com',
        ]);

        $this->assertEquals('http://success.com', $config->success_url);
    }

    /** @test */
    public function can_set_cancel_url()
    {
        $config = new HostedCheckout([
            'cancel_url' => 'http://cancel.com',
        ]);

        $this->assertEquals('http://cancel.com', $config->cancel_url);
    }
}
