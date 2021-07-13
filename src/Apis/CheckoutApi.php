<?php

namespace IBill\Apis;

use IBill\Config;
use IBill\Models\Checkout;

class CheckoutApi extends BaseApi
{
    public function createCheckout(Checkout $body)
    {
        $url = $this->config->baseUrl . '/session/create';

        $client = new \GuzzleHttp\Client();
        $headers = [
            'user-agent'    => Config::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'iBill-Version' => $this->config->iBillVersion,
            'Authorization' => sprintf('Bearer %1$s', $this->config->accessToken)
        ];

        $response = $client->request('POST', $url, ['headers' => $headers]);
        $body = json_decode($response->getBody()->__toString());

        return $body;
        // echo "\r\n";
        // var_dump($url);
        // var_dump($headers);

        // var_dump($response->getStatusCode());
        // ;
        // var_dump($response);
        // var_dump($response->getBody()->getContents());
        // var_dump($response->getBody()->__toString());
        // var_dump($body);

        // echo "End Of Create Checkout" . "\r\n";


        /*

        $_queryBuilder = '/v2/locations/{location_id}/checkouts';

        //process optional query parameters
        $_queryBuilder = ApiHelper::appendUrlWithTemplateParameters($_queryBuilder, [
            'location_id' => $locationId,
        ]);

        //validate and preprocess url
        $_queryUrl = ApiHelper::cleanUrl($this->config->getBaseUri() . $_queryBuilder);

        //prepare headers
        $_headers = [
            'user-agent'    => BaseApi::USER_AGENT,
            'Accept'        => 'application/json',
            'content-type'  => 'application/json',
            'Square-Version' => $this->config->getSquareVersion(),
            'Authorization' => sprintf('Bearer %1$s', $this->config->getAccessToken())
        ];
        $_headers = ApiHelper::mergeHeaders($_headers, $this->config->getAdditionalHeaders());

        //json encode body
        $_bodyJson = Request\Body::Json($body);

        $_httpRequest = new HttpRequest(HttpMethod::POST, $_headers, $_queryUrl);

        //call on-before Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnBeforeRequest($_httpRequest);
        }
        // Set request timeout
        Request::timeout($this->config->getTimeout());

        // and invoke the API call request to fetch the response
        try {
            $response = Request::post($_queryUrl, $_headers, $_bodyJson);
        } catch (\Unirest\Exception $ex) {
            throw new ApiException($ex->getMessage(), $_httpRequest);
        }

        $_httpResponse = new HttpResponse($response->code, $response->headers, $response->raw_body);
        $_httpContext = new HttpContext($_httpRequest, $_httpResponse);

        //call on-after Http callback
        if ($this->getHttpCallBack() != null) {
            $this->getHttpCallBack()->callOnAfterRequest($_httpContext);
        }

        if (!$this->isValidResponse($_httpResponse)) {
            return ApiResponse::createFromContext($response->body, null, $_httpContext);
        }

        $mapper = $this->getJsonMapper();
        $deserializedResponse = $mapper->mapClass($response->body, 'Square\\Models\\CreateCheckoutResponse');
        return ApiResponse::createFromContext($response->body, $deserializedResponse, $_httpContext);
        */
    }
}
