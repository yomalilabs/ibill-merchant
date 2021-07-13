<?php

namespace IBill\Apis;

use IBill\Models\ApiConfig;

class BaseApi
{
    /**
     * @var ApiConfig
     */
    protected $config;

    /**
     * Constructor that sets the timeout of requests
     */
    public function __construct(ApiConfig $config)
    {
        $this->config = $config;
    }
}
