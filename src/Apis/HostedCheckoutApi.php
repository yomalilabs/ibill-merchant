<?php

namespace IBill\Apis;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;

class HostedCheckoutApi extends BaseApi
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function create(HostedCheckout $body)
    {
        $url = $this->config->baseUrl . '/hosted/checkout/create';

        return $this->post($url, $body);
    }
}
