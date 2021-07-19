<?php

namespace IBill\Responses;

use IBill\Responses\Response;
use stdClass;

class HostedCheckoutResponse extends Response
{
    // the total amount in cents for what the checkout was created for
    public $amount = 0;
    // the url the client will be redirected to view the checkout page
    public $url = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->data->url)) {
            $this->url = $response->data->url;
        }
    }
}
