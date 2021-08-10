<?php

namespace IBill\Requests;

use IBill\Models\PaymentAuthorize;
use IBill\Responses\PaymentAuthorizeResponse;

class PaymentAuthorizeRequest extends BaseRequest
{
    /**
     * Payment Authorize Request
     *
     * @param PaymentAuthorize $body
     */
    public function request(PaymentAuthorize $body): PaymentAuthorizeResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/authorize';

        $response = $this->post($url, $body);

        return new PaymentAuthorizeResponse($response);
    }
}
