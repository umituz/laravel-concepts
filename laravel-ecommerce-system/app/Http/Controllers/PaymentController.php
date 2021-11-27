<?php

namespace App\Http\Controllers;

use App\Helpers\AuthHelper;
use App\Helpers\GenerateHelper;
use App\Libraries\Sipay;
use App\Models\Siparis;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PaymentController extends Controller
{
    /**
     * @return Application|Factory|View|RedirectResponse
     */
    public function index()
    {
        if (!session()->has('order_' . AuthHelper::id())) {
            session()->put('order_' . AuthHelper::id(),$this->getOrder());
        }
        if (!AuthHelper::check()) {
            return redirect()->route("kullanici.oturumac")
                ->with("mesaj_tur", "info")
                ->with("mesaj", "Ödeme işlemleri için oturum açınız..");
        } else if (count(Cart::content()) == 0) {
            return redirect()->route("anasayfa")
                ->with("mesaj_tur", "info")
                ->with("mesaj", "Ödeme işlemleri için sepetinizde en az 1 ürün bulunmalıdır..");
        }

        $userDetail = AuthHelper::userDetail('detay');

        $currentYear = date('Y');

        return view('modules.payment.index', compact(
            'userDetail',
            'currentYear'
        ));
    }

    private function getOrder()
    {
        $siparis = request()->all();
        $siparis["sepet_id"] = session("aktif_sepet_id");
        $siparis["banka"] = "Garanti";
        $siparis["taksit_sayisi"] = 1;
        $siparis["durum"] = "Siparişiniz Alındı";
        $siparis["siparis_tutari"] = Cart::subtotal();
        return $siparis;
    }

    /**
     * @return RedirectResponse
     */
    public function makePayment()
    {
        $order = $this->getOrder();

        if (AuthHelper::userDetail('payment_method') == 1) {
            $result = $this->sipayWith3D($order);
        } else {
            $result = $this->sipayWith2D($order);
        }

        if ($result == 100) {
            $this->createOrder($order);
            return redirect()->route("siparis")
                ->with("mesaj_tur", "success")
                ->with("mesaj", "Ödemeniz başarılı bir şekilde gerçekleştirildi.");
        }

        return redirect()->back("siparis")
            ->with("mesaj_tur", "danger")
            ->with("mesaj", "Ödemeniz başarılısız!");

    }

    private function createOrder($order)
    {
        Siparis::create($order);
        Cart::destroy();
        session()->forget("aktif_sepet_id");
    }

    public function successful()
    {
        $this->createOrder($this->getOrder());
        return view('modules.payment.successful', [
            'data' => request()->all()
        ]);
    }

    public function fail()
    {
        return view('modules.payment.fail', [
            'data' => request()->all()
        ]);
    }

    public function sipayWith2D($order)
    {
        $total = $order['siparis_tutari'];
        $invoiceId = GenerateHelper::randomInvoiceId();

        $sipay = new Sipay();

        $hash = $sipay->generateHashKey($total, 1, 'TRY', $sipay->getMerchantKey(), $invoiceId, $sipay->getAppSecret());
        $items = [["name" => "Item 1", "price" => $total, "qnantity" => 1, "description" => "Item 1 Description"]];

        $requestToken = $sipay->getToken();

        $result = $sipay
            ->post("/api/paySmart2D")
            ->addHeader('Authorization', 'Bearer ' . $requestToken->response->data->token)
            ->addParameter('cc_holder_name', $order['cc_holder_name'])
            ->addParameter('cc_no', $order['cc_no'])
            ->addParameter('expiry_month', $order['expiry_month'])
            ->addParameter('expiry_year', $order['expiry_year'])
            ->addParameter('cvv', $order['cvv'])
            ->addParameter('currency_code', 'TRY')
            ->addParameter('installments_number', 1)
            ->addParameter('total', $total)
            ->addParameter('invoice_id', $invoiceId)
            ->addParameter('invoice_description', 'INVOICE TEST DESCRIPTION')
            ->addParameter('merchant_key', $sipay->getMerchantKey())
            ->addParameter('name', 'Jhon Dao')
            ->addParameter('surname', 'SipayClass')
            ->addParameter('hash_key', $hash)
            ->addParameter('items', $items)
            ->execute();

        return $result->response->status_code;
    }

    public function sipayWith3D($order)
    {
        $total = 2.00;
        $invoiceId = GenerateHelper::randomInvoiceId();
        $sipay = new Sipay();
        $hash = $sipay->generateHashKey($total, 1, 'TRY', $sipay->getMerchantKey(), $invoiceId, $sipay->getAppSecret());
        $items = [["name" => "Item 1", "price" => 2.00, "qnantity" => 1, "description" => "Item 1 Description"]];

        $requestToken = $sipay->getToken();

        $requestPaySmart3D = $sipay
            ->post("/api/paySmart3D")
            ->addHeader('Authorization', 'Bearer ' . $requestToken->response->data->token)
            ->addParameter('cc_holder_name', 'John Dao SipayClass')
            ->addParameter('cc_no', '4508034508034509')
            ->addParameter('expiry_month', '12')
            ->addParameter('expiry_year', '2026')
            ->addParameter('cvv', '000')
            ->addParameter('currency_code', 'TRY')
            ->addParameter('installments_number', 1)
            ->addParameter('total', $total)
            ->addParameter('invoice_id', $invoiceId)
            ->addParameter('invoice_description', 'INVOICE TEST DESCRIPTION')
            ->addParameter('merchant_key', $sipay->getMerchantKey())
            ->addParameter('name', 'Jhon Dao')
            ->addParameter('surname', 'SipayClass')
            ->addParameter('hash_key', $hash)
            ->addParameter('items', json_encode($items))
            ->addParameter('return_url', "http://127.0.0.1:8000/payment/successful")
            ->addParameter('cancel_url', "http://127.0.0.1:8000/payment/fail")
            ->execute();

        if ($requestPaySmart3D->http_code != 200) {
            echo json_encode($requestPaySmart3D);
            exit;
        }

        echo $requestPaySmart3D->htmlBody;
        exit;
    }

}
