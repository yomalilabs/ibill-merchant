<?php

namespace Tests\Unit\Models;

use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use PHPUnit\Framework\TestCase;

class HostedCheckoutTest extends TestCase
{
    private function validParams($overrides = [])
    {
        return array_merge([
            'amount' => 2000, // in cents
            'reference' => '123456789',
            'cancel_url' => 'http://merchant.ibill.test/cancel',
            'success_url' => 'http://merchant.ibill.test/success'

        ], $overrides);
    }

    /** @test */
    public function initialize_model()
    {
        $model = new HostedCheckout($this->validParams());

        $data = $model->toArray();
        $this->assertEquals(2000, $data['amount']);
        $this->assertEquals('123456789', $data['reference']);
        $this->assertEquals('http://merchant.ibill.test/cancel', $data['cancel_url']);
        $this->assertEquals('http://merchant.ibill.test/success', $data['success_url']);
    }

    /** @test */
    public function validate_reference()
    {
        try {
            $params = $this->validParams();
            unset($params['reference']);
            $model = new HostedCheckout($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_success_url()
    {
        try {
            $params = $this->validParams();
            unset($params['success_url']);
            $model = new HostedCheckout($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_cancel_url()
    {
        try {
            $params = $this->validParams();
            unset($params['cancel_url']);
            $model = new HostedCheckout($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function initialize_model_with_products()
    {
        $params = $this->validParams(
            [
                'products' => [
                    new Product([
                        'quantity' => 1,
                        'codename' => 'product1',
                    ]),
                    new Product([
                        'quantity' => 2,
                        'codename' => 'product2',
                    ]),
                ]
            ],
        );
        unset($params['amount']);
        $model = new HostedCheckout($params);

        $this->assertEquals(true,  is_array($model->toArray()['products']));
        $this->assertEquals('product1', $model->toArray()['products'][0]['codename']);
        $this->assertEquals('product2', $model->toArray()['products'][1]['codename']);
    }

    /** @test */
    public function can_set_shipping_amount()
    {
        $model = new HostedCheckout($this->validParams(['shipping_amount' => 500]));
        $this->assertEquals(500, $model->toArray()['shipping_amount']);
    }

    /** @test */
    public function can_set_tax_amount()
    {
        $model = new HostedCheckout($this->validParams(['tax_amount' => 500]));
        $this->assertEquals(500, $model->toArray()['tax_amount']);
    }

    /** @test */
    public function validate_set_products()
    {
        try {
            $model = new HostedCheckout($this->validParams(['products' => 'string']));
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout($this->validParams(['products' => 1]));
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout($this->validParams(['products' => ['foo', 'bar']]));
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout($this->validParams(['products' => [
                new Product(),
            ]]));
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));
    }
}
