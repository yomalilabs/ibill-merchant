<?php

namespace IBill\Models;

class CaptureAuthorizedPayment extends Model
{
    private $amount;
    private $authorized_payment_id;

    public function __construct(array $options = null)
    {
        $this->amount = $options['amount'];
        $this->authorized_payment_id = $options['authorized_payment_id'];
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->amount,
            'authorized_payment_id' => $this->authorized_payment_id,
        ];
    }
}
