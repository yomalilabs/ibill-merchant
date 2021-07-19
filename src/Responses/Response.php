<?php

namespace IBill\Responses;

use stdClass;

class Response
{
    public $success = 0;
    public $error = null;

    public function __construct(stdClass $response = null)
    {
        if (isset($response->success)) {
            $this->success = $response->success;
        }

        if (isset($response->error)) {
            $this->error = $response->error;
        }
    }
}
