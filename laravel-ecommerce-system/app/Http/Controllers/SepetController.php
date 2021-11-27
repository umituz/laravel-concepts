<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Models\Card;
use App\Models\CardDetail;
use App\Models\Sepet;
use App\Models\SepetUrun;
use App\Models\Urun;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Validator;

/**
 * Class SepetController
 * @package App\Http\Controllers
 */
class SepetController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        return view('sepet');
    }

    /**
     * @return RedirectResponse
     */
    public function ekle()
    {
        $urun = Urun::findOrFail(request("id"));

        $cartItem = Cart::add($urun->id, $urun->urun_ad, 1, $urun->fiyat, 0, ["slug" => $urun->slug]);

        if (AuthHelper::check()) {
            $aktif_sepet_id = session("aktif_sepet_id");

            if (!isset($aktif_sepet_id)) {
                $aktif_sepet = Sepet::create(["kullanici_id" => AuthHelper::id()]);
                $aktif_sepet_id = $aktif_sepet->id;
                session()->put("aktif_sepet_id", $aktif_sepet_id);
            }

            $card = Card::firstOrCreate([
                'kullanici_id' => AuthHelper::id(),
                'ip_address' => request()->server('REMOTE_ADDR'),
                'user_agent' => request()->server('HTTP_USER_AGENT')
            ]);

            CardDetail::updateOrCreate(
                ['card_id' => $aktif_sepet_id, 'urun_id' => $urun->id],
                ["adet" => $cartItem->qty, "fiyat" => $cartItem->price, "durum" => "Beklemede"]
            );

        }

        return redirect()
            ->route("sepet")
            ->with("mesaj", "Ürününüz Sepete Eklendi")
            ->with("mesaj_tur", "success");
    }

    /**
     * @param $rowId
     * @return RedirectResponse
     */
    public function kaldir($rowId)
    {
        if (auth()->check()) {
            $aktif_sepet_id = session("aktif_sepet_id");
            $cartItem = Cart::get($rowId);
            SepetUrun::where("sepet_id", $aktif_sepet_id)
                ->where("urun_id", $cartItem->id)
                ->delete();
        }
        Cart::remove($rowId);
        return redirect()
            ->route("sepet")
            ->with("mesaj", "Ürününüz Sepetten Kaldırıldı")
            ->with("mesaj_tur", "success");
    }

    /**
     * @return RedirectResponse
     */
    public function bosalt()
    {
        if (auth()->check()) {
            $aktif_sepet_id = session("aktif_sepet_id");
            SepetUrun::where("sepet_id", $aktif_sepet_id)->delete();
        }

        Cart::destroy();
        return redirect()
            ->route("sepet")
            ->with("mesaj", "Sepetiniz Boşaltıldı")
            ->with("mesaj_tur", "success");
    }

    /**
     * @param $rowId
     * @return JsonResponse
     */
    public function guncelle($rowId)
    {
        $validator = Validator::make(request()->all(), [
            "adet" => "required|numeric|between:0,25"
        ]);

        if ($validator->fails()) {
            session()->flash("mesaj_tur", "danger");
            session()->flash("mesaj", "Adet sayısı en fazla 1 ila 25 arasında olabilir.");
            return response()->json(["success" => false]);
        }

        if (auth()->check()) {
            $aktif_sepet_id = session("aktif_sepet_id");
            $cartItem = Cart::get($rowId);

            if (request("adet") == 0) {
                SepetUrun::where("sepet_id", $aktif_sepet_id)
                    ->where("urun_id", $cartItem->id)
                    ->delete();
            } else {
                SepetUrun::where("sepet_id", $aktif_sepet_id)
                    ->where("urun_id", $cartItem->id)
                    ->update(["adet" => request("adet")]);
            }
        }

        Cart::update($rowId, request('adet'));

        session()->flash("mesaj_tur", "success");
        session()->flash("mesaj", "Adet Bilgisi Güncellendi");

        return response()->json();
    }

}
