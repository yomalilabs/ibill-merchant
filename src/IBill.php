<?php

namespace IBill;

use IBill\Requests\HostedCheckoutRequest;
use IBill\Requests\ValidatePaymentRequest;
use IBill\Models\ApiConfig;
use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Models\HostedCheckout;
use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use IBill\Models\ValidateHostedCheckout;
use IBill\Requests\AuthorizeAndCapturePaymentRequest;
use IBill\Requests\AuthorizePaymentRequest;
use IBill\Requests\CaptureAuthorizedPaymentRequest;
use IBill\Requests\ValidateHostedCheckoutRequest;
use IBill\Responses\AuthorizeAndCapturePaymentResponse;
use IBill\Responses\HostedCheckoutResponse;
use IBill\Responses\AuthorizePaymentResponse;
use IBill\Responses\CaptureAuthorizedPaymentResponse;
use IBill\Responses\ValidateHostedCheckoutResponse;

/**
 * iBill client class
 */
class IBill
{
    /**
     * @var ApiConfig
     */
    private $config;

    public function __construct(array $configOptions = null)
    {
        $this->config = new ApiConfig($configOptions);
    }

    public function getConfig()
    {
        return $this->config;
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
    public function validateHostedCheckout(ValidateHostedCheckout $model): ValidateHostedCheckoutResponse
    {
        return (new ValidateHostedCheckoutRequest($this->config))->validate($model);
    }

    /**
     * Do a payment authorize request
     */
    public function authorizePayment(AuthorizePayment $model): AuthorizePaymentResponse
    {
        return (new AuthorizePaymentRequest($this->config))->request($model);
    }

    /**
     * Do a capture authorized payment request
     */
    public function captureAuthorizedPayment(CaptureAuthorizedPayment $model): CaptureAuthorizedPaymentResponse
    {
        return (new CaptureAuthorizedPaymentRequest($this->config))->request($model);
    }

    /**
     * Do a capture authorized payment request
     */
    public function authorizeAndCapturePayment(AuthorizeAndCapturePayment $model): AuthorizeAndCapturePaymentResponse
    {
        return (new AuthorizeAndCapturePaymentRequest($this->config))->request($model);
    }
}
