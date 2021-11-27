<?php

namespace App\Http\Controllers;

use App\Contracts\PaymentGatewayContract;
use App\Services\OrderDetailService;

/**
 * Class PayOrderController
 * @package App\Http\Controllers
 */
class PayOrderController extends Controller
{
    /**
     * Charge the amount
     *
     * @param OrderDetailService $OrderDetailService
     * @param PaymentGatewayContract $paymentGateWay
     */
    public function store(OrderDetailService $OrderDetailService, PaymentGatewayContract $paymentGateWay)
    {
        $order = $OrderDetailService->all();

        dd($paymentGateWay->charge(2750));
    }
}
