<?php

namespace IBill;

use IBill\Apis\CheckoutApi;
use IBill\Models\ApiConfig;
use IBill\Models\Checkout;

/**
 * iBill client class
 */
class IBillClient
{
    /**
     * @var ApiConfig
     */
    private $config;

    public function __construct(array $configOptions = null)
    {
        $this->config = new ApiConfig($configOptions);
    }

    /**
     * Returns Checkout Api
     */
    public function createCheckout(Checkout $checkout)
    {
        return (new CheckoutApi($this->config))->createCheckout($checkout);
    }
}
