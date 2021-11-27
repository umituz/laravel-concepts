<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Mail\KullaniciKayit;
use App\Models\KullaniciDetay;
use App\Models\SepetUrun;
use App\Models\Sepet;
use App\Models\Kullanici;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

/**
 * Class KullaniciController
 * @package App\Http\Controllers
 */
class KullaniciController extends Controller
{
    /**
     * KullaniciController constructor.
     */
    public function __construct()
    {
        $this->middleware("guest")->except("oturumukapat");
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function giris_form()
    {
        return view('kullanici.oturumac');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function giris()
    {
        $this->validate(request(),[
            "email"     => "required|email",
            "sifre"     => "required"
        ]);

        $credentials = [
            "email"         => request()->get("email"),
            "password"      => request()->get("sifre"),
            "aktif_mi"      => 1
        ];

        if(auth()->attempt($credentials,request()->has("benihatirla")))
        {
            request()->session()->regenerate();

            $aktif_sepet_id = Sepet::aktif_sepet_id();
            if(is_null($aktif_sepet_id))
            {
                $aktif_sepet = Sepet::create(["kullanici_id" => AuthHelper::id()]);
                $aktif_sepet_id = $aktif_sepet->id;
            }
            session()->put("aktif_sepet_id",$aktif_sepet_id);

            $cartClass = Cart::class;
            if(class_exists($cartClass)){
                if(Cart::count() > 0)
                {
                    foreach(Cart::content() as $cartItem)
                    {
                        SepetUrun::updateOrCreate(
                            ["sepet_id" => $aktif_sepet_id, "urun_id" => $cartItem->id],
                            ["adet" => $cartItem->qty, "fiyat" => $cartItem->price, "durum" => "Beklemede"]
                        );
                    }
                }
                Cart::destroy();
                $sepetUrunler = SepetUrun::where("sepet_id",$aktif_sepet_id)->get();
                foreach($sepetUrunler as $sepetUrun)
                {
                    Cart::add($sepetUrun->urun->id,$sepetUrun->urun->urun_ad,$sepetUrun->adet,$sepetUrun->fiyat,0,["slug" => $sepetUrun->urun->slug]);
                }
            }
            return redirect()->intended("/");
        }
        else
        {
            $errors = ["email" => "Hatalı Giriş, Bilgilerinizi Kontrol Ediniz"];
            return back()->withErrors($errors);
        }
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function kaydol_form()
    {
        return view('kullanici.kaydol');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function kaydol()
    {
        $this->validate(request(),[
            "adsoyad"   => "required|min:5|max:60",
            "email"     => "required|email|unique:kullanici",
            "sifre"     => "required|confirmed"
        ]);

        $kullanici = Kullanici::create([
            "adsoyad"               => request("adsoyad"),
            "email"                 => request("email"),
            "sifre"                 => Hash::make(request("sifre")),
            "aktivasyon_anahtari"   => Str::random(60),
            "aktif_mi"   => 0,
        ]);

        $kullanici->detay()->save(new KullaniciDetay());

        Mail::to(request("email"))->send(new KullaniciKayit($kullanici));

        auth()->login($kullanici);

        return redirect()->route("anasayfa");
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function oturumukapat()
    {
        auth()->logout();
        request()->session()->flush();
        request()->session()->regenerate();
        return redirect()->route("anasayfa");

    }

    /**
     * @param $anahtar
     * @return \Illuminate\Http\RedirectResponse
     */
    public function aktiflestir($anahtar)
    {
        $kullanici = Kullanici::where("aktivasyon_anahtari",$anahtar)->first();
        if(!is_null($kullanici))
        {
            $kullanici->aktivasyon_anahtari = NULL;
            $kullanici->aktif_mi            = 1;
            $kullanici->save();

            return redirect()
                ->to("/")
                ->with("mesaj","Kullanıcı Kaydınız Aktifleştirildi")
                ->with("mesaj_tur","success");
        }
        else
        {
            return redirect()
                ->to("/")
                ->with("mesaj","Kullanıcı Kaydınız Aktifleştilemedii")
                ->with("mesaj_tur","warning");
        }
    }

}
