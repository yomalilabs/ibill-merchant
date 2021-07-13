<?php

namespace IBill\Models;

class Checkout
{
    public $amount;

    public function __construct(array $options = null)
    {
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
    }
}
