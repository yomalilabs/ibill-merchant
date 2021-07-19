<?php

namespace IBill\Requests;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;
use IBill\Models\ValidatePayment;

class ValidatePaymentRequest extends BaseRequest
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function validate(ValidatePayment $body)
    {
        $url = $this->config->baseUrl . '/hosted/checkout/validate';

        return $this->post($url, $body);
    }
}
