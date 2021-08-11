<?php

namespace IBill\Requests;

use IBill\Models\AuthorizeAndCapturePayment;
use IBill\Responses\AuthorizeAndCapturePaymentResponse;

class AuthorizeAndCapturePaymentRequest extends BaseRequest
{
    /**
     * Payment Authorize Request
     *
     * @param AuthorizeAndCapturePayment $body
     */
    public function request(AuthorizeAndCapturePayment $body): AuthorizeAndCapturePaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/authorize-and-capture';

        $response = $this->post($url, $body);

        return new AuthorizeAndCapturePaymentResponse($response);
    }
}
