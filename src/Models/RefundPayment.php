<?php

namespace IBill\Models;

class RefundPayment extends Model
{
    private $firstname;
    private $lastname;
    private $email;
    private $address;
    private $zip;

    private $payment_id;
    private $amount;
    private $card_number;
    private $card_expiry_month;
    private $card_expiry_year;

    public function __construct(array $options = null)
    {
        $this->amount = $options['amount'];
        $this->payment_id = $options['payment_id'];

        // $this->firstname = $options['firstname'];
        // $this->lastname = $options['lastname'];
        // $this->email = $options['email'];
        // $this->address = $options['address'];
        // $this->zip = $options['zip'];

        // $this->card_number = $options['card_number'];
        // $this->card_expiry_month = $options['card_expiry_month'];
        // $this->card_expiry_year = $options['card_expiry_year'];
    }

    public function toArray(): array
    {
        return [
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'email' => $this->email,
            'address' => $this->address,
            'zip' => $this->zip,

            'payment_id' => $this->payment_id,
            'amount' => $this->amount,
            'card_number' => $this->card_number,
            'card_expiry_month' => $this->card_expiry_month,
            'card_expiry_year' => $this->card_expiry_year,
        ];
    }
}
