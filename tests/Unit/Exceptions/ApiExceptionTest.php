<?php

namespace Tests\Unit\Exceptions;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\IBill;
use PHPUnit\Framework\TestCase;

class ApiExceptionTest extends TestCase
{
    /** @test */
    public function can_throw_exception_with_error()
    {
        try {
            throw new ApiException('something went wrong');
        } catch (ApiException $exception) {
            $this->assertEquals('something went wrong', $exception->error);
        }
    }
}
