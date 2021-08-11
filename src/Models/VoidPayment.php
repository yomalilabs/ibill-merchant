<?php

namespace IBill\Models;

class VoidPayment extends Model
{
    private $amount;
    private $payment_id;

    public function __construct(array $options = null)
    {
        $this->amount = $options['amount'];
        $this->payment_id = $options['payment_id'];
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'payment_id' => $this->payment_id,
        ];
    }
}
