<?php

namespace IBill\Responses;

use IBill\Responses\Response;
use stdClass;

class PaymentAuthorizeResponse extends Response
{
    // the unique reference id
    public $uuid = 0;

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->uuid)) {
            $this->uuid = $response->uuid;
        }
    }
}
