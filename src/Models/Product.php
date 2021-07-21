<?php

namespace IBill\Models;

class Product extends Model
{
    public $amount;
    public $codename;

    public function __construct(array $options = null)
    {
        if (isset($options['codename'])) {
            $this->codename = $options['codename'];
        }
        if (isset($options['amount'])) {
            $this->amount = $options['amount'];
        }
    }

    public function toArray()
    {
        return [
            'amount' => $this->amount,
            'codename' => $this->codename,
            'success_url' => $this->success_url,
            'cancel_url' => $this->cancel_url,
        ];
    }
}
