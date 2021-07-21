<?php

namespace Tests\Unit\Models;

use IBill\Config;
use IBill\Models\ApiConfig;
use IBill\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    /** @test */
    public function can_set_codename()
    {
        $config = new Product(['codename' => 'product-1']);
        $this->assertEquals('product-1', $config->codename);
    }

    /** @test */
    public function can_set_the_amount()
    {
        $config = new Product(['amount' => 1000]);
        $this->assertEquals(1000, $config->amount);
    }

    /** @test */
    public function can_set_the_quantity()
    {
        $config = new Product();
        $this->assertEquals(1, $config->quantity);

        $config = new Product(['quantity' => 2]);
        $this->assertEquals(2, $config->quantity);
    }
}
