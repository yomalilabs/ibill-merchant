<?php

namespace IBill\Responses;

use IBill\Responses\Response;
use stdClass;

class VoidPaymentResponse extends Response
{
    // the unique reference id
    public $id = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->id)) {
            $this->id = $response->id;
        }
    }
}
