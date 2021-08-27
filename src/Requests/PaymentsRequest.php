<?php

namespace IBill\Requests;

use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use IBill\Models\ChargePayment;
use IBill\Models\RefundPayment;
use IBill\Models\VoidPayment;
use IBill\Responses\AuthorizePaymentResponse;
use IBill\Responses\CaptureAuthorizedPaymentResponse;
use IBill\Responses\ChargePaymentResponse;
use IBill\Responses\RefundPaymentResponse;
use IBill\Responses\VoidPaymentResponse;

class PaymentsRequest extends BaseRequest
{
    /**
     * Payment Authorize Request
     *
     * @param AuthorizePayment $body
     */
    public function authorize(AuthorizePayment $body): AuthorizePaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/authorize';

        $response = $this->post($url, $body);

        return new AuthorizePaymentResponse($response);
    }

    /**
     * Payment Authorize Request
     *
     * @param AuthorizePayment $body
     */
    public function capture(CaptureAuthorizedPayment $body): CaptureAuthorizedPaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/capture';

        $response = $this->post($url, $body);

        return new CaptureAuthorizedPaymentResponse($response);
    }

    /**
     * Payment Charge Payment Request
     *
     * @param ChargePayment $body
     */
    public function charge(ChargePayment $body): ChargePaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/charge';

        $response = $this->post($url, $body);

        return new ChargePaymentResponse($response);
    }

    /**
     * Payment Refund Request
     *
     * @param RefundPayment $body
     */
    public function refund(RefundPayment $body): RefundPaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/refund';

        $response = $this->post($url, $body);

        return new RefundPaymentResponse($response);
    }

    /**
     * Payment Void Request
     *
     * @param VoidPayment $body
     */
    public function void(VoidPayment $body): VoidPaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/void';

        $response = $this->post($url, $body);

        return new VoidPaymentResponse($response);
    }
}
