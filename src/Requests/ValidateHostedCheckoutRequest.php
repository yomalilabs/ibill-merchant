<?php

namespace IBill\Requests;

use IBill\Models\HostedCheckout;
use IBill\Models\ValidateHostedCheckout;
use IBill\Responses\ValidateHostedCheckoutResponse;

class ValidateHostedCheckoutRequest extends BaseRequest
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function validate(ValidateHostedCheckout $body): ValidateHostedCheckoutResponse
    {
        $url = $this->config->baseUrl . '/hosted/checkout/validate';

        $response = $this->post($url, $body);

        return new ValidateHostedCheckoutResponse($response);
    }
}
