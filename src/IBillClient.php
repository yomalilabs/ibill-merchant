<?php

namespace IBill;

use IBill\Apis\HostedCheckoutApi;
use IBill\Apis\ValidatePaymentApi;
use IBill\Models\ApiConfig;
use IBill\Models\HostedCheckout;
use IBill\Models\ValidatePayment;

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
    public function createHostedCheckout(HostedCheckout $model)
    {
        return (new HostedCheckoutApi($this->config))->create($model);
    }

    /**
     * Returns Checkout Api
     */
    public function validatePayment(ValidatePayment $model)
    {
        return (new ValidatePaymentApi($this->config))->validate($model);
    }
}
