<?php

namespace IBill\Models;

class HostedCheckout
{
    public $amount;
    public $cancel_url;
    public $success_url;

    public function __construct(array $options = null)
    {
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
        if (isset($options['success_url'])) {
            $this->success_url = $options['success_url'];
        }
        if (isset($options['cancel_url'])) {
            $this->cancel_url = $options['cancel_url'];
        }
    }
}
