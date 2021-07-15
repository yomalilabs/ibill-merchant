<?php

namespace IBill\Models;

use IBill\Config;

/**
 * Default values for the configuration parameters of the client.
 */
class ApiConfig
{
    public $baseUrl = Config::API_URL;
    public $timeout = Config::TIMEOUT;
    public $iBillVersion = Config::IBILL_VERSION;
    public $accessToken = Config::ACCESS_TOKEN;
    public $additionalHeaders = Config::ADDITIONAL_HEADERS;
    public $environment = Config::ENVIRONMENT;
    public $userAgent = Config::USER_AGENT;

    public function __construct(array $configOptions = null)
    {
        if (isset($configOptions['timeout'])) {
            $this->timeout = $configOptions['timeout'];
        }
        if (isset($configOptions['accessToken'])) {
            $this->accessToken = $configOptions['accessToken'];
        }
        if (isset($configOptions['environment'])) {
            $this->environment = $configOptions['environment'];
        }

        if ($this->environment === 'sandbox') {
            $this->baseUrl = Config::API_URL_SANDBOX;
        }

        if ($this->environment === 'production') {
            $this->baseUrl = Config::API_URL;
        }
    }
}
