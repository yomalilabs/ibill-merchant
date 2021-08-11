<?php

namespace IBill\Responses;

use IBill\Responses\Response;
use stdClass;

class CaptureAuthorizedPaymentResponse extends Response
{
    // the unique reference id
    public $uuid = '';
    public $authorized_payment_id = '';

    public function __construct(stdClass $response = null)
    {
        parent::__construct($response);

        if (isset($response->uuid)) {
            $this->uuid = $response->uuid;
        }
        if (isset($response->authorized_payment_id)) {
            $this->authorized_payment_id = $response->authorized_payment_id;
        }
    }
}
