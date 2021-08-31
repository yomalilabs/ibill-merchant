<?php

namespace Tests;

use IBill\Models\ChargePayment;
use PHPUnit\Framework\TestCase as PHPTestCase;

class TestCase extends PHPTestCase
{
    protected function validChargePaymentModel()
    {
        $model = new ChargePayment([
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'info@example.com',
            'address' => '1234 Fake Address',
            'zip' => 12345,

            'amount' => 1525,
            'card_number' => 6011111111111117,
            'card_cvv' => 123,
            'card_expiry_month' => 10,
            'card_expiry_year' => 2025,
        ]);

        return $model;
    }
}
