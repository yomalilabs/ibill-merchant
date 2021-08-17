<?php

namespace Tests\Unit\Models;

use IBill\Exceptions\ApiException;
use IBill\Models\AuthorizePayment;
use IBill\Models\HostedCheckout;
use IBill\Models\Product;
use PHPUnit\Framework\TestCase;

class AuthorizePaymentTest extends TestCase
{
    private function validParams($overrides = [])
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
        ], $overrides);
    }

    /** @test */
    public function initialize_model()
    {
        $model = new AuthorizePayment($this->validParams());

        $productArray = $model->toArray();
        $this->assertEquals('Firstname', $productArray['firstname']);
        $this->assertEquals('Lastname', $productArray['lastname']);
        $this->assertEquals('info@example.com', $productArray['email']);
        $this->assertEquals('1234 Fake Address', $productArray['address']);
        $this->assertEquals(12345, $productArray['zip']);
        $this->assertEquals(1025, $productArray['amount']);
        $this->assertEquals(6011111111111117, $productArray['card_number']);
        $this->assertEquals(123, $productArray['card_cvv']);
        $this->assertEquals(10, $productArray['card_expiry_month']);
        $this->assertEquals(2025, $productArray['card_expiry_year']);
    }

    /** @test */
    public function validate_amount()
    {
        // no amount passed
        try {
            $params = $this->validParams();
            unset($params['amount']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));

        // minimum amount
        try {
            $params = $this->validParams(['amount' => 10]);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_firstname()
    {
        try {
            $params = $this->validParams();
            unset($params['firstname']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_lastname()
    {
        try {
            $params = $this->validParams();
            unset($params['lastname']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_email()
    {
        try {
            $params = $this->validParams();
            unset($params['email']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_address()
    {
        try {
            $params = $this->validParams();
            unset($params['address']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_zip()
    {
        try {
            $params = $this->validParams();
            unset($params['zip']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_number()
    {
        try {
            $params = $this->validParams();
            unset($params['card_number']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_cvv()
    {
        try {
            $params = $this->validParams();
            unset($params['card_cvv']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_expiry_month()
    {
        try {
            $params = $this->validParams();
            unset($params['card_expiry_month']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }

    /** @test */
    public function validate_card_expiry_year()
    {
        try {
            $params = $this->validParams();
            unset($params['card_expiry_year']);
            $model = new AuthorizePayment($params);
        } catch (ApiException $error) {
            $this->assertNotNull($error->message);
        }
        $this->assertFalse(isset($model));
    }
}
