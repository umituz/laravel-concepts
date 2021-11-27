<?php

namespace App\Http\Controllers\Admin\Merchant;

use App\Http\Controllers\Controller;
use App\Libraries\Sipay;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function index()
    {
        $poses = $this->getPoses();
        return view('admin.modules.merchant.pos.index',compact(
            'poses'
        ));
    }

    private function getPoses()
    {
        $sipay = new Sipay();
        $requestToken = $sipay->getToken();

        $is_2d = 0;
        if($requestToken->response->data->is_3d == 0){
            $is_2d = 1;
        }

        $requestGetPos = $sipay->post("/api/getpos")
            ->addHeader('Authorization', 'Bearer '. $requestToken->response->data->token)
            ->addParameter('credit_card', '534261') // Bin Number
            ->addParameter('amount', '1')
            ->addParameter('currency_code', 'TRY')
            ->addParameter('merchant_key', $sipay->getMerchantKey())
            ->addParameter('is_2d', $is_2d)
            ->execute();

        return collect($requestGetPos->response->data);
    }
}
