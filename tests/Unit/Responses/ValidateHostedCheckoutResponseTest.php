<?php

namespace Tests\Unit\Models;

use IBill\Responses\ValidateHostedCheckoutResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class ValidateHostedCheckoutResponseTest extends TestCase
{
    /** @test */
    public function can_set_amount()
    {
        $class = new stdClass;
        $class->amount = 1000;
        $response = new ValidateHostedCheckoutResponse($class);

        $this->assertEquals(1000, $response->amount);
    }

    /** @test */
    public function can_set_status()
    {
        $class = new stdClass;
        $class->status = 'valid';
        $response = new ValidateHostedCheckoutResponse($class);

        $this->assertEquals('valid', $response->status);
    }
}
