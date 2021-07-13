<?php

namespace IBill\Apis;

use IBill\Exceptions\ApiException;
use IBill\Models\ApiConfig;
use Psr\Http\Message\ResponseInterface;

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

    /**
     * Is the response valid?
     */
    protected function isValidResponse(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }

    /**
     * Format the resposne
     *
     * @param ResponseInterface $response
     */
    protected function formatResponse(ResponseInterface $response)
    {
        if ($response->getBody() && $response->getBody()->__toString()) {
            $data = json_decode($response->getBody()->__toString());
            if ((int) $data->success === 1) {
                return $data;
            }

            throw new ApiException($data->error->message);
        }

        throw new ApiException("Whoops! Something went wrong.");
    }
}
