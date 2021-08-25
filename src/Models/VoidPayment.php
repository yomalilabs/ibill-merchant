<?php

namespace IBill\Models;

class VoidPayment extends Model
{
    private $amount;
    private $payment_id;

    public function __construct(array $attributes = null)
    {
        $this->validateExists($attributes, [
            'amount',
            'payment_id',
        ]);

        $this->amount = $attributes['amount'];
        $this->payment_id = $attributes['payment_id'];
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'payment_id' => $this->payment_id,
        ];
    }
}
