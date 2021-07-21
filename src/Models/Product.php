<?php

namespace IBill\Models;

class Product extends Model
{
    public $amount;
    public $codename;
    public $quantity = 1;

    public function __construct(array $options = null)
    {
        if (isset($options['codename'])) {
            $this->codename = $options['codename'];
        }
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
        if (isset($options['quantity'])) {
            $this->quantity = $options['quantity'];
        }
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'codename' => $this->codename,
            'quantity' => $this->quantity,
        ];
    }
}
