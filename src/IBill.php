<?php

namespace IBill;

use IBill\Models\ApiConfig;
use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use IBill\Models\ChargePayment;
use IBill\Models\HostedCheckout;
use IBill\Models\LookupPayment;
use IBill\Models\RefundPayment;
use IBill\Models\ValidateHostedCheckout;
use IBill\Models\VoidPayment;
use IBill\Requests\HostedCheckoutRequest;
use IBill\Requests\PaymentsRequest;
use IBill\Requests\ValidateHostedCheckoutRequest;
use IBill\Responses\AuthorizePaymentResponse;
use IBill\Responses\CaptureAuthorizedPaymentResponse;
use IBill\Responses\ChargePaymentResponse;
use IBill\Responses\HostedCheckoutResponse;
use IBill\Responses\LookupPaymentResponse;
use IBill\Responses\RefundPaymentResponse;
use IBill\Responses\ValidateHostedCheckoutResponse;
use IBill\Responses\VoidPaymentResponse;

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
     * Do a authorize payment request
     * Hold off the money in the client's account until capture or expired
     *
     * @param AuthorizePayment $model
     * @return AuthorizePaymentResponse
     */
    public function authorizePayment(AuthorizePayment $model): AuthorizePaymentResponse
    {
        return (new PaymentsRequest($this->config))->authorize($model);
    }

    /**
     * Do a capture authorized payment request
     * Take the money that was authorized
     *
     * @param CaptureAuthorizedPayment $model
     * @return CaptureAuthorizedPaymentResponse
     */
    public function captureAuthorizedPayment(CaptureAuthorizedPayment $model): CaptureAuthorizedPaymentResponse
    {
        return (new PaymentsRequest($this->config))->capture($model);
    }

    /**
     * Do a charge payment request (will skip the authorization)
     *
     * @param ChargePayment $model
     * @return ChargePaymentResponse
     */
    public function chargePayment(ChargePayment $model): ChargePaymentResponse
    {
        return (new PaymentsRequest($this->config))->charge($model);
    }

    /**
     * Do a refund payment request
     *
     * @param RefundPayment $model
     * @return RefundPaymentResponse
     */
    public function refundPayment(RefundPayment $model): RefundPaymentResponse
    {
        return (new PaymentsRequest($this->config))->refund($model);
    }

    /**
     * Do a void payment request
     *
     * @param VoidPayment $model
     * @return VoidPaymentResponse
     */
    public function voidPayment(VoidPayment $model): VoidPaymentResponse
    {
        return (new PaymentsRequest($this->config))->void($model);
    }

    /**
     * Do a lookup payment request
     *
     * @param LookupPayment $model
     * @return LookupPaymentResponse
     */
    public function lookupPayment(LookupPayment $model): LookupPaymentResponse
    {
        return (new PaymentsRequest($this->config))->lookup($model);
    }
}
