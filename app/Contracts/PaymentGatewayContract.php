<?php

namespace App\Contracts;

/**
 * Interface PaymentGatewayContract
 * @package App\Contracts
 */
interface PaymentGatewayContract
{
    /**
     * Charge fee
     *
     * @param $amount
     * @return array
     */
    public function charge($amount);

    /**
     * Sets discount with given amount
     *
     * @param $amount
     */
    public function setDiscount($amount);
}
