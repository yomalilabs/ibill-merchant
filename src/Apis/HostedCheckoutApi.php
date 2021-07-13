<?php

namespace IBill\Apis;

use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\HostedCheckout;

class HostedCheckoutApi extends BaseApi
{
    public function create(HostedCheckout $body)
    {
        $url = $this->config->baseUrl . '/hosted/checkout/create';

        $client = new \GuzzleHttp\Client();
        $headers = [
            'user-agent'    => Config::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'iBill-Version' => $this->config->iBillVersion,
            'Authorization' => sprintf('Bearer %1$s', $this->config->accessToken)
        ];

        $response = $client->request('POST', $url, ['headers' => $headers]);

        if ($this->isValidResponse($response)) {
            return $this->formatResponse($response);
        }

        throw new ApiException($body->error);
    }
}
