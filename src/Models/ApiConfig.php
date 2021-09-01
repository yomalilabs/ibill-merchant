<?php

namespace IBill\Models;

use IBill\Config;
use IBill\Exceptions\ApiException;

/**
 * Default values for the configuration parameters of the client.
 */
class ApiConfig
{
    private $accountId;
    private $accessToken;

    private $baseUrl = Config::API_URL;
    private $timeout = Config::TIMEOUT;
    private $iBillVersion = Config::IBILL_VERSION;
    private $additionalHeaders = Config::ADDITIONAL_HEADERS;
    private $environment = Config::ENVIRONMENT;
    private $userAgent = Config::USER_AGENT;
    private $paymentGatewayUsername = Config::PAYMENT_GATEWAY_USERNAME;

    public function __construct(array $configOptions = null)
    {
        // validation
        if (!isset($configOptions['account_id'])) {
            throw new ApiException("Please provide the account_id attribute.");
        }
        if (!isset($configOptions['access_token'])) {
            throw new ApiException("Please provide the access_token attribute.");
        }

        if (isset($configOptions['account_id'])) {
            $this->accountId = $configOptions['account_id'];
        }
        if (isset($configOptions['access_token'])) {
            $this->accessToken = $configOptions['access_token'];
        }
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        // if (isset($configOptions['environment'])) {
        //     $this->environment = $configOptions['environment'];
        // }

        // do not allow the customer to override
        // if (isset($configOptions['payment_gateway_username'])) {
        //     $this->paymentGatewayUsername = $configOptions['payment_gateway_username'];
        // }

        // when sandbox - append _sandbox to the gateway username
        if (isset($configOptions['environment']) && $configOptions['environment'] === 'sandbox') {
            // $this->baseUrl = Config::API_URL_SANDBOX;
            $this->environment = 'sandbox';
            $this->paymentGatewayUsername .= '_sandbox';
        }
    }

    public function getAccountId()
    {
        return $this->accountId;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function getEnvironment()
    {
        return $this->environment;
    }

    public function getBaseUrl()
    {
        return $this->baseUrl;
    }

    public function getPaymentGatewayUsername()
    {
        return $this->paymentGatewayUsername;
    }
}
