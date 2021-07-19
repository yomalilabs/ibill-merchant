<?php

namespace Tests\Unit\Models;

use IBill\Responses\HostedCheckoutResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class HostedCheckoutResponseTest extends TestCase
{
    /** @test */
    public function can_set_amount()
    {
        $class = new stdClass;
        $class->amount = 1000;
        $response = new HostedCheckoutResponse($class);

        $this->assertEquals(1000, $response->amount);
    }

    /** @test */
    public function can_set_url()
    {
        $class = new stdClass;
        $class->url = 'https://checkout.ibill.com';
        $response = new HostedCheckoutResponse($class);

        $this->assertEquals('https://checkout.ibill.com', $response->url);
    }
}
