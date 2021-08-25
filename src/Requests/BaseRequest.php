<?php

namespace IBill\Requests;

use Exception;
use GuzzleHttp\Client;
use IBill\Config;
use IBill\Exceptions\ApiException;
use IBill\Models\ApiConfig;
use IBill\Models\Model;
use Psr\Http\Message\ResponseInterface;

class BaseRequest
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
     * Post the body to the given url
     *
     * @param string $url
     * @param [type] $body
     */
    protected function post(string $url, Model $body)
    {
        $client = new Client();
        $headers = [
            'user-agent'    => Config::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'iBill-Version' => Config::IBILL_VERSION,
            'iBill-Account-Id' => $this->config->getAccountId(),
            'iBill-Environment' => $this->config->getEnvironment(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];

        echo "\r\n" . "URL: {$url}" . "\r\n";
        print_r($body->toArray());

        try {
            $response = $client->post($url, [
                'json' => $body->toArray(),
                'headers' => $headers
            ]);
        } catch (Exception $e) {
            // var_dump('-----------------------------------');
            throw new ApiException($e->getMessage());
            // var_dump($e->getCode());
            // var_dump($e->getMessage());
        }

        echo "\r\n" . "\r\n";
        echo "RESPONSE" . "\r\n";
        echo "\r\n" . "\r\n";
        var_dump((string) $response->getBody());
        echo "\r\n" . "\r\n";
        if ($this->isValidResponse($response)) {
            return $this->formatResponse($response);
        }

        throw new ApiException("Whoops! Something went wrong.");
    }

    /**
     * Is the response valid?
     */
    protected function isValidResponse(ResponseInterface $response): bool
    {
        return $response->getStatusCode() >= 200 && $response->getStatusCode() < 300;
    }

    /**
     * Format the response
     *
     * @param ResponseInterface $response
     */
    protected function formatResponse(ResponseInterface $response)
    {
        if ($response->getBody() && (string) $response->getBody()) {
            $data = json_decode((string) $response->getBody());
            if ($data && isset($data->success) && (int) $data->success === 1) {
                return $data;
            }

            // var_dump("ERROR: formatResponse - formatResponse");
            // var_dump((string) $response->getBody());

            if ($data && isset($data->error)) {
                throw new ApiException($data->error);
            }
        }

        throw new ApiException("Whoops! Something went wrong.");
    }
}
