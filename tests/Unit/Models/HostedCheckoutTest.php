<?php

namespace Tests\Unit\Models;

use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use PHPUnit\Framework\TestCase;

class HostedCheckoutTest extends TestCase
{
    /** @test */
    public function can_set_reference()
    {
        $model = new HostedCheckout(['reference' => 'reference']);
        $this->assertEquals('reference', $model->reference);
    }

    /** @test */
    public function can_set_amount()
    {
        $model = new HostedCheckout(['amount' => 5000]);
        $this->assertEquals(5000, $model->amount);
    }

    /** @test */
    public function can_set_success_url()
    {
        $model = new HostedCheckout(['success_url' => 'http://success.com']);
        $this->assertEquals('http://success.com', $model->success_url);
    }

    /** @test */
    public function can_set_cancel_url()
    {
        $model = new HostedCheckout(['cancel_url' => 'http://cancel.com']);
        $this->assertEquals('http://cancel.com', $model->cancel_url);
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

        $this->assertEquals(true, is_array($model->products));
    }

    /** @test */
    public function can_convert_to_array()
    {
        $model = new HostedCheckout([
            'reference' => 'reference',
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

        $this->assertEquals('reference', $model->toArray()['reference']);
        $this->assertEquals('product-1', $model->toArray()['products'][0]->codename);
        // $this->assertEquals('product-1', $model->toArray()['products'][0]['codename']);
    }
}
