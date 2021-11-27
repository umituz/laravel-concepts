<?php

namespace App\Http\Controllers\Customer;

use App\Helpers\AuthHelper;
use App\Http\Controllers\Controller;

class SettingsController extends Controller
{
    public function index()
    {
        $paymentMethod  = AuthHelper::userDetail('payment_method');
        return view('customer.settings.index',compact(
            'paymentMethod'
        ));
    }

    public function update()
    {
        $user = AuthHelper::user();
        $user->payment_method = request('payment_method');
        $user->save();

        return redirect()
        ->back()
        ->with("mesaj", "Ayarlarınız kaydeddili")
        ->with("mesaj_tur", "success");
    }
}
