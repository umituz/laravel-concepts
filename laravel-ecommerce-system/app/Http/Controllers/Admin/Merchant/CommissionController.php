<?php

namespace App\Http\Controllers\Admin\Merchant;

use App\Http\Controllers\Controller;
use App\Libraries\Sipay;
use Illuminate\Http\Request;

class CommissionController extends Controller
{
    public function index()
    {
        $commissions = $this->getCommissions();
        return view('admin.modules.merchant.commission.index',compact(
            'commissions'
        ));
    }

    private function getCommissions()
    {
        $sipay = new Sipay();
        $requestCommissions = $sipay
            ->addParameter('currency_code', 'TRY')
            ->getCommissions();
        return collect($requestCommissions->response->data);
    }
}
