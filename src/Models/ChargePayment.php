<?php

namespace IBill\Models;

class ChargePayment extends Model
{
    private $firstname;
    private $lastname;
    private $email;
    private $address;
    private $zip;

    private $amount;
    private $card_number;
    private $card_cvv;
    private $card_expiry_month;
    private $card_expiry_year;

    public function __construct(array $attributes = null)
    {
        $this->validateExists($attributes, [
            'amount',
            'firstname',
            'lastname',
            'email',
            'address',
            'zip',
            'amount',
            'card_number',
            'card_cvv',
            'card_expiry_month',
            'card_expiry_year',
        ]);

        $this->firstname = $attributes['firstname'];
        $this->lastname = $attributes['lastname'];
        $this->email = $attributes['email'];
        $this->address = $attributes['address'];
        $this->zip = $attributes['zip'];

        $this->amount = $attributes['amount'];
        $this->card_number = $attributes['card_number'];
        $this->card_cvv = $attributes['card_cvv'];
        $this->card_expiry_month = $attributes['card_expiry_month'];
        $this->card_expiry_year = $attributes['card_expiry_year'];
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
