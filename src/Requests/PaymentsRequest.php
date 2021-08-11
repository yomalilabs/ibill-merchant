<?php

namespace IBill\Requests;

use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Models\AuthorizePayment;
use IBill\Models\CaptureAuthorizedPayment;
use IBill\Models\RefundPayment;
use IBill\Models\VoidPayment;
use IBill\Responses\AuthorizeAndCapturePaymentResponse;
use IBill\Responses\AuthorizePaymentResponse;
use IBill\Responses\CaptureAuthorizedPaymentResponse;
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
     * Payment Authorize and Capture Request
     *
     * @param AuthorizeAndCapturePayment $body
     */
    public function authorizeAndCapture(AuthorizeAndCapturePayment $body): AuthorizeAndCapturePaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/authorize-and-capture';

        $response = $this->post($url, $body);

        return new AuthorizeAndCapturePaymentResponse($response);
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
