<?php

namespace IBill\Models;

class ValidateHostedCheckout extends Model
{
    public $payment_id;

    public function __construct(array $options = null)
    {
        if (isset($options['payment_id'])) {
            $this->payment_id = $options['payment_id'];
        }
    }

    public function toArray(): array
    {
        return [
            'payment_id' => $this->payment_id,
        ];
    }
}
