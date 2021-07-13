<?php

namespace IBill;

use IBill\Apis\HostedCheckoutApi;
use IBill\Models\ApiConfig;
use IBill\Models\HostedCheckout;

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
    public function createHostedCheckout(HostedCheckout $checkout)
    {
        return (new HostedCheckoutApi($this->config))->create($checkout);
    }
}
