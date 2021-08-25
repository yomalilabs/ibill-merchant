<?php

namespace Tests\Unit\Models;

use IBill\Exceptions\ApiException;
use IBill\Models\VoidPayment;
use PHPUnit\Framework\TestCase;

class VoidPaymentTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'amount' => 1025,
            'payment_id' => 'abcd1234',
        ], $overrides);
    }

    /** @test */
    public function initialize_model()
    {
        $model = new VoidPayment($this->validParams());

        $productArray = $model->toArray();
        $this->assertEquals(1025, $productArray['amount']);
        $this->assertEquals('abcd1234', $productArray['payment_id']);
    }

    /** @test */
    public function validate_amount()
    {
        // no amount passed
        try {
            $params = $this->validParams();
            unset($params['amount']);
            $model = new VoidPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));

        // minimum amount
        try {
            $params = $this->validParams(['amount' => 10]);
            $model = new VoidPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_authorized_payment_id()
    {
        try {
            $params = $this->validParams();
            unset($params['payment_id']);
            $model = new VoidPayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
