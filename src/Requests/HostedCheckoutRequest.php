<?php

namespace IBill\Requests;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;
use IBill\Responses\HostedCheckoutResponse;

class HostedCheckoutRequest extends BaseRequest
{
    /**
     * Create a hosted checkout session
     *
     * @param HostedCheckout $body
     */
    public function create(HostedCheckout $body): HostedCheckoutResponse
    {
        $url = $this->config->baseUrl . '/hosted/checkout/create';

        $response = $this->post($url, $body);

        return new HostedCheckoutResponse($response);
    }
}
