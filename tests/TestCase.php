<?php

namespace Tests;

use IBill\Config;
use IBill\IBill;
use IBill\Models\ChargePayment;
use PHPUnit\Framework\TestCase as PHPTestCase;

class TestCase extends PHPTestCase
{
    protected function validIBillClient()
    {
        return new IBill($this->validIBillClientParams());
    }

    protected function validIBillClientParams(array $overrides = [])
    {
        return array_merge([
            'environment' => 'sandbox',
            'account_id' => Config::TEST_ACCOUNT_ID,
            'access_token' => Config::TEST_ACCESS_TOKEN,
        ], $overrides);
    }

    protected function validParamsForAuthOrChargeModel(array $overrides = [])
    {
        return array_merge([
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'info@example.com',
            'address' => '1234 Fake Address',
            'zip' => 12345,

            'amount' => 1025,
            'card_number' => 6011111111111117,
            'card_cvv' => 123,
            'card_expiry_month' => 10,
            'card_expiry_year' => 2025,

            'order_id' => random_int(1, 99999),
        ], $overrides);
    }

    protected function validChargePaymentModel()
    {
        $model = new ChargePayment($this->validParamsForAuthOrChargeModel());

        return $model;
    }
}
