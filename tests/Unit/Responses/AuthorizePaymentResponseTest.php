<?php

namespace Tests\Unit\Responses;

use IBill\Responses\AuthorizePaymentResponse;
use PHPUnit\Framework\TestCase;
use stdClass;

class AuthorizePaymentResponseTest extends TestCase
{
    /** @test */
    public function can_set_id()
    {
        $class = (object) ['id' => 'abcd1234'];
        $response = new AuthorizePaymentResponse($class);

        $this->assertEquals('abcd1234', $response->id);
    }
}
