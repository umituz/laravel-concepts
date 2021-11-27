<?php

namespace App\Http\Controllers\Yonetim;

use App\Models\Kullanici;
use App\Models\KullaniciDetay;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class KullaniciController
 * @package App\Http\Controllers\Yonetim
 */
class KullaniciController extends Controller
{
    /**
     * @return \Illuminate\View\View
     * @throws \Illuminate\Validation\ValidationException
     */
    public function oturumac()
    {
        if (request()->isMethod("POST")) {
            $this->validate(request(), ["email" => "required|email", "sifre" => "required"]);

            $credentials = [
                "email" => request()->get("email"),
                "password" => request()->get("sifre"),
                "yonetici_mi" => 1,
                "aktif_mi" => 1
            ];

            if (Auth::guard("yonetim")->attempt($credentials, request()->has("benihatirla"))) {
                return redirect()->route("yonetim.anasayfa");
            } else {
                return back()->withInput()->withErrors(["email" => "Giriş Hatalı!"]);
            }
        }
        return view("yonetim.oturumac");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oturumukapat()
    {
        Auth::guard("yonetim")->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("yonetim.oturumac");
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (request()->filled("aranan")) {
            request()->flash();
            $aranan = request("aranan");
            $kullanicilar = Kullanici::where("adsoyad", "like", "%$aranan%")
                ->orWhere("email", "like", "%$aranan%")
                ->orderByDesc("olusturulma_tarihi")
                ->paginate(5)
                ->appends("aranan", $aranan);
        } else {
            $kullanicilar = Kullanici::orderByDesc("olusturulma_tarihi")->paginate(10);
        }
        return view("yonetim.kullanici.index", compact("kullanicilar"));
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function form($id = 0)
    {
        $kullanici = null;
        if ($id > 0) {
            $kullanici = Kullanici::find($id);
        }

        return view("yonetim.kullanici.form", compact("kullanici"));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function kaydet($id = 0)
    {
        $this->validate(request(), [
            "adsoyad" => "required",
            "email" => "required|email"
        ]);

        $data = request()->only("adsoyad", "email");

        if (request()->filled("sifre")) {
            $data["sifre"] = Hash::make(request("sifre"));
        }

        $data["aktif_mi"] = request()->has("aktif_mi") && request("aktif_mi") == 1 ? 1 : 0;
        $data["yonetici_mi"] = request()->has("yonetici_mi") && request("yonetici_mi") == 1 ? 1 : 0;

        if ($id > 0) {
            $kullanici = Kullanici::where("id", $id)->firstOrFail();
            $kullanici->update($data);
            $kullanici->save();
        } else {
            $kullanici = Kullanici::create($data);
            $kullanici->save();
        }

        KullaniciDetay::updateOrCreate(
            ["kullanici_id" => $kullanici->id],
            [
                "adres" => request("adres"),
                "telefon" => request("telefon")
            ]
        );

        return redirect()
            ->route("yonetim.kullanici.duzenle", $kullanici->id)
            ->with("mesaj", $id > 0 ? 'Güncellendi' : 'Kaydedildi')
            ->with("mesaj_tur", "success");
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sil($id)
    {
        Kullanici::destroy($id);
        return redirect()
            ->route("yonetim.kullanici.index")
            ->with("mesaj", "Silindi")
            ->with("mesaj_tur", "success");

    }

}
