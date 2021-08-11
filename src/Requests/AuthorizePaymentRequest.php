<?php

namespace IBill\Requests;

use IBill\Models\AuthorizePayment;
use IBill\Responses\AuthorizePaymentResponse;

class AuthorizePaymentRequest extends BaseRequest
{
    /**
     * Payment Authorize Request
     *
     * @param AuthorizePayment $body
     */
    public function request(AuthorizePayment $body): AuthorizePaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/authorize';

        $response = $this->post($url, $body);

        return new AuthorizePaymentResponse($response);
    }
}
