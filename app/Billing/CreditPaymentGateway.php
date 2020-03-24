<?php

namespace App\Billing;

use App\Contracts\PaymentGatewayContract;
use Illuminate\Support\Str;

/**
 * Class PaymentGateway
 *
 * @package App\Billing
 */
class CreditPaymentGateway implements PaymentGatewayContract
{
    /**
     * System's currency
     *
     * @var string
     */
    private $currency;

    /**
     * The discount
     *
     * @var integer
     */
    private $discount;

    /**
     * PaymentGateway constructor.
     * @param $currency
     */
    public function __construct($currency)
    {
        $this->currency = $currency;
        $this->discount = 0;
    }

    /**
     * Charge fee
     *
     * @param $amount
     * @return array
     */
    public function charge($amount)
    {
        // Charge the bank

        $fees = $amount * 0.03;
        return [
            'amount' => ($amount - $this->discount) + $fees,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount,
            'fees' => $fees
        ];
    }

    /**
     * Sets discount with given amount
     *
     * @param $amount
     */
    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }
}
