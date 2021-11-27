<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kategori;
use App\Models\Urun;
use App\Models\UrunDetay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UrunController extends Controller
{
    public function index()
    {
        if(request()->filled("aranan"))
        {
            request()->flash();
            $aranan = request("aranan");
            $urunler = Urun::where("urun_ad","like","%$aranan%")
                ->orWhere("aciklama","like","%$aranan%")
                ->orderByDesc("id")
                ->paginate(10)
                ->appends("aranan",$aranan);
        }
        else
        {
            request()->flush();
            $urunler = Urun::orderByDesc("id")->paginate(10);
        }
        return view("yonetim.urun.index",compact("urunler"));
    }

    public function form($id = 0)
    {
        $urun = new Urun;
        $urun_kategorileri = [];
        if($id > 0)
        {
            $urun = Urun::find($id);
            $urun_kategorileri = $urun->kategoriler()->pluck("kategori_id")->all();
        }

        $kategoriler = Kategori::all();

        return view("yonetim.urun.form",compact("urun","kategoriler","urun_kategorileri"));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only("urun_ad","slug","fiyat","aciklama");

        if(!request()->filled("slug"))
        {
            $data["slug"] = str_slug(request("urun_ad"));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(),[
            "urun_ad"   => "required",
            "fiyat"     => "required",
            "slug"          => (request("original_slug") != request("slug")) ? 'unique:urun,slug' : '',
        ]);

        $data_detay = request()->only("goster_slider","goster_gunun_firsati",
            "goster_one_cikan","goster_cok_satan","goster_indirimli");

        $kategoriler = request("kategoriler");

        if($id > 0)
        {
            $urun = Urun::where("id",$id)->firstOrFail();
            $urun->update($data);
            $urun->save();

            $urun->detay()->update($data_detay);
            $urun->kategoriler()->sync($kategoriler);
        }
        else
        {
            $urun = Urun::create($data);
            $urun->save();
            $urun->detay()->create($data_detay);
            $urun->kategoriler()->attach($kategoriler);
        }

        if(request()->hasFile("urun_resmi"))
        {
            $this->validate(request(),[
                "urun_resmi"    =>  "image|mimes:jpg,png,jpeg|max:2048"
            ]);

            $urun_resmi = request()->file("urun_resmi");

            $dosya_adi = $urun->id . "-" . time() . "." . $urun_resmi->extension();


            if($urun_resmi->isValid())
            {
                $urun_resmi->move("uploads/urunler",$dosya_adi);
                UrunDetay::updateOrCreate(
                  ["urun_id"    => $urun->id],
                  ["urun_resmi" => $dosya_adi]
                );
            }
        }

        return redirect()
            ->route("yonetim.urun.duzenle",$urun->id)
            ->with("mesaj", $id > 0 ? 'GÜNCELLENDİ' : 'KAYDEDİLDİ')
            ->with("mesaj_tur", "success");
    }

    public function sil($id)
    {
        $urun = Urun::find($id);
        $urun->kategoriler()->detach();
//        $urun->detay()->delete();
        $urun->delete();
        return redirect()
            ->route("yonetim.urun")
            ->with("mesaj", "Silindi")
            ->with("mesaj_tur", "success");

    }
}
