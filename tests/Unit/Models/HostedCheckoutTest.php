<?php

namespace Tests\Unit\Models;

use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use PHPUnit\Framework\TestCase;

class HostedCheckoutTest extends TestCase
{
    /** @test */
    public function can_set_reference()
    {
        $model = new HostedCheckout(['reference' => 'reference']);
        $this->assertEquals('reference', $model->toArray()['reference']);
    }

    /** @test */
    public function can_set_amount()
    {
        $model = new HostedCheckout(['amount' => 5000]);
        $this->assertEquals(5000, $model->toArray()['amount']);
    }

    /** @test */
    public function can_set_success_url()
    {
        $model = new HostedCheckout(['success_url' => 'http://success.com']);
        $this->assertEquals('http://success.com', $model->toArray()['success_url']);
    }

    /** @test */
    public function can_set_cancel_url()
    {
        $model = new HostedCheckout(['cancel_url' => 'http://cancel.com']);
        $this->assertEquals('http://cancel.com', $model->toArray()['cancel_url']);
    }

    /** @test */
    public function can_set_shipping_amount()
    {
        $model = new HostedCheckout(['shipping_amount' => 500]);
        $this->assertEquals(500, $model->toArray()['shipping_amount']);
    }

    /** @test */
    public function can_set_tax_amount()
    {
        $model = new HostedCheckout(['tax_amount' => 500]);
        $this->assertEquals(500, $model->toArray()['tax_amount']);
    }

    /** @test */
    public function can_set_products()
    {
        $model = new HostedCheckout([
            'products' => [
                new Product([
                    'quantity' => 1,
                    'codename' => 'product-1',
                ]),
                new Product([
                    'quantity' => 2,
                    'codename' => 'product-2',
                ]),
            ],
        ]);

        $this->assertEquals(true,  is_array($model->toArray()['products']));
        $this->assertEquals('product-1', $model->toArray()['products'][0]->codename);
        $this->assertEquals('product-2', $model->toArray()['products'][1]->codename);
    }

    /** @test */
    public function validate_set_products()
    {
        try {
            $model = new HostedCheckout(['products' => 'string']);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout(['products' => 1]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout(['products' => ['foo', 'bar']]);
        } catch (ApiException $error) {
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));

        try {
            $model = new HostedCheckout(['products' => [
                new Product(),
            ]]);
        } catch (ApiException $error) {
            echo "" . $error->error . "\r\n";
            $this->assertNotNull($error->error);
        }
        $this->assertFalse(isset($model));
    }
}
