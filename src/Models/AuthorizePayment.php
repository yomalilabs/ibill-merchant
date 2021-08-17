<?php

namespace IBill\Models;

use IBill\Exceptions\ApiException;

class AuthorizePayment extends Model
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

    public function __construct(array $options = null)
    {
        // amount must be in cents and bigger than 100
        if (!isset($options['amount']) || (!is_integer($options['amount']) || $options['amount'] < 100)) {
            throw new ApiException("The minimum amount is 100 cents.");
        }

        $this->validateExists([
            'firstname',
            'lastname'
        ]);

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
