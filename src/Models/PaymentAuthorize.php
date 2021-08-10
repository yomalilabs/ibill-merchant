<?php

namespace IBill\Models;

class PaymentAuthorize extends Model
{
    public $firstname;
    public $lastname;
    public $email;
    public $address;
    public $zip;

    public $amount;
    public $card_number;
    public $card_cvv;
    public $card_expiry_month;
    public $card_expiry_year;

    public function __construct(array $options = null)
    {
        $this->firstname = $options['firstname'];
        $this->lastname = $options['lastname'];
        $this->email = $options['email'];
        $this->address = $options['address'];
        $this->zip = $options['zip'];

        $this->amount = $options['amount'];
        $this->card_number = $options['card_number'];
        $this->card_cvv = $options['card_cvv'];
        $this->card_expiry_month = $options['card_expiry_month'];
        $this->card_expiry_year = $options['card_expiry_year'];
    }

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'address' => $this->address,
            'zip' => $this->zip,

            'amount' => $this->amount,
            'card_number' => $this->card_number,
            'card_cvv' => $this->card_cvv,
            'card_expiry_month' => $this->card_expiry_month,
            'card_expiry_year' => $this->card_expiry_year,
        ];
    }
}
