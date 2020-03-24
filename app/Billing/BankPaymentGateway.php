<?php

namespace App\Billing;

use App\Contracts\PaymentGatewayContract;
use Illuminate\Support\Str;

/**
 * Class PaymentGateway
 *
 * @package App\Billing
 */
class BankPaymentGateway implements PaymentGatewayContract
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

        return [
            'amount' => $amount - $this->discount,
            'confirmation_number' => Str::random(),
            'currency' => $this->currency,
            'discount' => $this->discount
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
