<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Siparis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiparisController extends Controller
{
    public function index()
    {
        if(request()->filled("aranan"))
        {
            request()->flash();
            $aranan = request("aranan");
            $siparisler = Siparis::with("sepet.kullanici")
                ->where("id","like","%$aranan%")
                ->orWhere("id",$aranan)
                ->orderByDesc("id")
                ->paginate(10)
                ->appends("aranan",$aranan);
        }
        else
        {
            request()->flush();
            $siparisler = Siparis::with("sepet.kullanici")
                ->orderByDesc("id")
                ->paginate(10);
        }
        return view("yonetim.siparis.index",compact("siparisler"));
    }

    public function form($id = 0)
    {
        if($id > 0)
        {
            $siparis = Siparis::with("sepet.sepet_urunler")->find($id);
        }

        return view("yonetim.siparis.form",compact("siparis"));
    }

    public function kaydet($id = 0)
    {
        $this->validate(request(),[
            "adsoyad"   => "required",
            "adres"     => "required",
            "telefon"   => "required",
            "durum"     => "required",
        ]);

        $data = request()->only("adsoyad","adres","telefon","durum");

        if($id > 0)
        {
            $urun = Siparis::where("id",$id)->firstOrFail();
            $urun->update($data);
            $urun->save();
        }

        return redirect()
            ->route("yonetim.siparis.duzenle",$urun->id)
            ->with("mesaj", "GÜNCELLENDİ")
            ->with("mesaj_tur", "success");
    }

    public function sil($id)
    {
        $siparis = Siparis::destroy($id);

        return redirect()
            ->route("yonetim.siparis")
            ->with("mesaj", "SİLİNDİ")
            ->with("mesaj_tur", "success");

    }
}
