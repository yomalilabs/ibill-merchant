<?php

namespace IBill\Models;

use IBill\Exceptions\ApiException;

class Product extends Model
{
    public $amount;
    public $codename;
    public $quantity = 1;

    public function __construct(array $options = null)
    {
        // codename can not contain hyphen
        if (isset($options['codename'])) {
            if (strpos($options['codename'], '-') !== false) {
                throw new ApiException("Product codename can not contain a hyphen.");
            }

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
