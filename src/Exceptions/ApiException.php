<?php

namespace IBill\Exceptions;

use Exception;

/**
 * Thrown when there is a network error or HTTP response status code that is not okay.
 */
class ApiException extends Exception
{
    public $error = '';

    public function __construct(string $error = '')
    {
        $this->error = $error;
    }
}
