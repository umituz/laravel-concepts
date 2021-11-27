<?php

namespace App\Services;

use App\Contracts\PaymentGatewayContract;

/**
 * Class OrderDetailServiceService
 * @package App\Services
 */
class OrderDetailService
{
    /**
     * @var PaymentGatewayContract
     */
    private $paymentGateway;

    /**
     * OrderDetailService constructor.
     *
     * @param PaymentGatewayContract $paymentGateway
     */
    public function __construct(PaymentGatewayContract $paymentGateway)
    {
        $this->paymentGateway = $paymentGateway;
    }

    /**
     * Returns all order's detail
     */
    public function all()
    {
        $this->paymentGateway->setDiscount(500);

        return [
            'name' => 'Ümit UZ',
            'address' => 'İstanbul / Turkey'
        ];
    }
}
