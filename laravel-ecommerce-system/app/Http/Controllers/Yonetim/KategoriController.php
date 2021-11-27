<?php

namespace App\Http\Controllers\Yonetim;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index()
    {
        if(request()->filled("aranan") || request()->filled("ust_kategori_id"))
        {
            request()->flash();
            $aranan = request("aranan");
            $ust_kategori_id = request("ust_kategori_id");

            $kategoriler = Kategori::with("ust_kategori")
                ->where("kategori_ad","like","%$aranan%")
                ->where("ust_kategori_id",$ust_kategori_id)
                ->orderByDesc("id")
                ->paginate(2)
                ->appends(["aranan" => $aranan, "ust_kategori_id" => $ust_kategori_id]);
        }
        else
        {
            request()->flush();
            $kategoriler = Kategori::with("ust_kategori")->orderByDesc("id")->paginate(10);
        }

        $ana_kategoriler = Kategori::whereRaw("ust_kategori_id is null")->get();

        return view("yonetim.kategori.index",compact("kategoriler","ana_kategoriler"));
    }

    public function form($id = 0)
    {
        $kategori = new Kategori;
        if($id > 0)
        {
            $kategori = Kategori::find($id);
        }
        $ust_kategoriler = Kategori::all();
        return view("yonetim.kategori.form",compact("kategori","ust_kategoriler"));
    }

    public function kaydet($id = 0)
    {
        $data = request()->only("kategori_ad","slug","ust_kategori_id");

        if(!request()->filled("slug"))
        {
            $data["slug"] = str_slug(request("kategori_ad"));
            request()->merge(['slug' => $data['slug']]);
        }

        $this->validate(request(),[
            "kategori_ad"   => "required",
            "slug"          => (request("original_slug") != request("slug")) ? 'unique:kategori,slug' : '',
        ]);

        if($id > 0)
        {
            $kategori = Kategori::where("id",$id)->firstOrFail();
            $kategori->update($data);
            $kategori->save();
        }
        else
        {
            $kategori = Kategori::create($data);
            $kategori->save();
        }

        return redirect()
            ->route("yonetim.kategori.duzenle",$kategori->id)
            ->with("mesaj", $id > 0 ? 'GÜNCELLENDİ' : 'KAYDEDİLDİ')
            ->with("mesaj_tur", "success");
    }

    public function sil($id)
    {
        $kategori = Kategori::find($id);
        $kategori->urunler()->detach();
        $kategori->delete();
        Kategori::destroy($id);
        return redirect()
            ->route("yonetim.kategori")
            ->with("mesaj", "SİLİNDİ")
            ->with("mesaj_tur", "success");

    }
}
