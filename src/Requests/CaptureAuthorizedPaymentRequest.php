<?php

namespace IBill\Requests;

use IBill\Models\CaptureAuthorizedPayment;
use IBill\Responses\CaptureAuthorizedPaymentResponse;

class CaptureAuthorizedPaymentRequest extends BaseRequest
{
    /**
     * Payment Authorize Request
     *
     * @param AuthorizePayment $body
     */
    public function request(CaptureAuthorizedPayment $body): CaptureAuthorizedPaymentResponse
    {
        $url = $this->config->getBaseUrl() . '/payment/capture';

        $response = $this->post($url, $body);

        return new CaptureAuthorizedPaymentResponse($response);
    }
}
