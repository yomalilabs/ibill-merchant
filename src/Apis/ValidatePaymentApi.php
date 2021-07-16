<?php

namespace IBill\Apis;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;
use IBill\Models\ValidatePayment;

class ValidatePaymentApi extends BaseApi
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
