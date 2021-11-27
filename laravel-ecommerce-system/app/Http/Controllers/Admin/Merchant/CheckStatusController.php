<?php

namespace App\Http\Controllers\Admin\Merchant;

use App\Http\Controllers\Controller;
use App\Libraries\Sipay;
use Illuminate\Http\Request;

class CheckStatusController extends Controller
{
    public function index()
    {
        $status = $this->checkStatus();
        return view('admin.modules.merchant.checkstatus.index', compact(
            'status'
        ));
    }

    private function checkStatus()
    {
        $invoiceId = request('invoiceId') ?? 'PF210605170428S89350';
        $sipay = new Sipay();
        $requestCheckStatus = $sipay
            ->addParameter('invoice_id', $invoiceId)
            ->addParameter('include_pending_status', true)
            ->getCheckStatus();

        return $requestCheckStatus->response;
    }
}
