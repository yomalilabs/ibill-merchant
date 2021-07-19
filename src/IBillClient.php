<?php

namespace IBill;

use IBill\Requests\HostedCheckoutRequest;
use IBill\Requests\ValidatePaymentRequest;
use IBill\Models\ApiConfig;
use IBill\Models\HostedCheckout;
use IBill\Models\ValidatePayment;
use IBill\Responses\HostedCheckoutResponse;

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
     * Do a request to create a hosted checkout session
     *
     * @param HostedCheckout $model
     * @return HostedCheckoutResponse
     */
    public function createHostedCheckout(HostedCheckout $model): HostedCheckoutResponse
    {
        return (new HostedCheckoutRequest($this->config))->create($model);
    }

    /**
     * Do a request to validate the payment
     */
    public function validatePayment(ValidatePayment $model)
    {
        return (new ValidatePaymentRequest($this->config))->validate($model);
    }
}
