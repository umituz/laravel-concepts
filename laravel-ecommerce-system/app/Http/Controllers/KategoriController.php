<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    public function index($kategori_adi)
    {
        $kategori = Kategori::where("slug",$kategori_adi)->firstOrFail();
        $alt_kategoriler = Kategori::where("ust_kategori_id",$kategori->id)->get();

        $order = request("order");

        if($order == "coksatanlar")
        {
            $urunler = $kategori->urunler()
                ->distinct()
                ->join("urun_detay","urun_detay.urun_id","urun.id")
                ->where("urun_detay.goster_cok_satan",1)
                ->orderBy("urun_detay.goster_cok_satan","desc")
                ->paginate(1);
        }
        else if($order == "yeni")
        {
            $urunler = $kategori->urunler()
                ->distinct()
                ->orderByDesc("guncellenme_tarihi")
                ->paginate(1);
        }
        else
        {
            $urunler = $kategori->urunler()
                ->distinct()
                ->paginate(1);
        }

        return view('kategori',compact("kategori","alt_kategoriler","urunler"));
    }
}
