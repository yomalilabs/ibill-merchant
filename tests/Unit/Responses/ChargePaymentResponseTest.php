<?php

namespace Tests\Unit\Responses;

use IBill\Responses\ChargePaymentResponse;
use PHPUnit\Framework\TestCase;

class ChargePaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new ChargePaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }
}
