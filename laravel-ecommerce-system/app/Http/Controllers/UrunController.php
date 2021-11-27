<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Urun;

class UrunController extends Controller
{
    public function index($urun_adi)
    {
        $urun = Urun::whereSlug($urun_adi)->firstOrFail();
        $kategoriler = $urun->kategoriler()->distinct()->get();
        return view('urun', compact("urun", "kategoriler"));
    }

    public function ara()
    {
        $aranan  = request()->input("aranan");
        $urunler = Urun::where("urun_ad","like","%$aranan%")
            ->orWhere("aciklama","like","%$aranan%")
            ->Paginate(2);

        request()->flash();

        return view("arama",compact("urunler"));
    }
}
