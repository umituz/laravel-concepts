@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Siparişler Yönetimi</h1>

    <form method="post" enctype="multipart/form-data"
          action="{{ route("yonetim.siparis.kaydet",@$siparis->id) }}">
        @csrf
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$siparis->id > 0 ? 'GÜNCELLE' : 'KAYDET'}}
            </button>
        </div>
        <h2 class="sub-header">
            SİPARİŞ {{ @$siparis->id > 0 ? 'DÜZENLE' : 'EKLE'}}
        </h2>

        @include("layouts.messages.validation_errors")
        @include("layouts.messages.session_alerts")

        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">
                        AD SOYAD
                    </label>
                    <input name="adsoyad"
                           type="text"
                           value="{{ old("adsoyad", @$siparis->adsoyad) }}"
                           class="form-control"
                           id="adsoyad"
                           placeholder="AD SOYAD">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefon">
                        TELEFON
                    </label>
                    <input name="telefon"
                           type="text"
                           value="{{ old("telefon", @$siparis->telefon) }}"
                           class="form-control"
                           id="telefon"
                           placeholder="TELEFON">
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">
                        ADRES
                    </label>
                    <input name="adres"
                           type="text"
                           class="form-control"
                           id="adres"
                           value="{{ old("adres",@$siparis->adres) }}"
                           placeholder="ADRES">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="siparis_tutari">
                        FİYAT
                    </label>
                    <input name="siparis_tutari"
                           type="text"
                           value="{{ old("siparis_tutari", @$siparis->siparis_tutari) }}"
                           class="form-control"
                           id="siparis_tutari"
                           placeholder="TELEFON">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="durum">
                        DURUM
                    </label>
                    <select name="durum" id="durum" class="form-control">
                        <option value="Siparişiniz Alındı"
                                {{ old("durum",$siparis->durum) == "Siparişiniz Alındı" ? 'selected' : null }}>
                            Siparişiniz Alındı
                        </option>
                        <option value="Ödeme Onaylandı"
                                {{ old("durum",$siparis->durum) == "Ödeme Onaylandı" ? 'selected' : null }}>
                            Ödeme Onaylandı
                        </option>
                        <option value="Kargoya Verildi"
                                {{ old("durum",$siparis->durum) == "Kargoya Verildi" ? 'selected' : null }}>
                            Kargoya Verildi
                        </option>
                        <option value="Siparişiniz Tamamlandı"
                                {{ old("durum",$siparis->durum) == "Siparişiniz Tamamlandı" ? 'selected' : null }}>
                            Sipariş Tamamlandı
                        </option>
                    </select>
                </div>
            </div>
        </div>

    </form>

    <div class="row">
        <div class="bg-content">
            <h2>Sipariş (SP-{{ $siparis->id }})</h2>
            <table class="table table-bordererd table-hover">
                <tr>
                    <th colspan="2">Ürün</th>
                    <th>Tutar</th>
                    <th>Adet</th>
                    <th>Durum</th>
                </tr>
                @foreach($siparis->sepet->sepet_urunler as $sepet_urun)
                    <tr>
                        <td width="120">
                            <a href="{{ route("urun",$sepet_urun->urun->slug) }}">
                                <img src="{{ $sepet_urun->urun->detay->urun_resmi != null ?
                             asset('uploads/urunler/' . $sepet_urun->urun->detay->urun_resmi) :
                             'http://via.placeholder.com/120x100?text=UrunResmi' }}"
                                     class="img-responsive"
                                     style="height:120px">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route("urun",$sepet_urun->urun->slug) }}">
                                {{ $sepet_urun->urun->urun_ad }}
                            </a>
                        </td>
                        <td>{{ $sepet_urun->fiyat }}</td>
                        <td>{{ $sepet_urun->adet }}</td>
                        <td>{{ $sepet_urun->durum }}</td>
                    </tr>
                @endforeach
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar</th>
                    <td colspan="2" class="text-right">{{ $siparis->siparis_tutari}}</td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Toplam Tutar (KDV Dahil)</th>
                    <td colspan="2" class="text-right">
                        {{ $siparis->siparis_tutari * (100 + config("cart.tax") / 100)   }}
                    </td>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Sipariş Durum</th>
                    <td colspan="2" class="text-right">{{ $siparis->durum}}</td>
                </tr>

            </table>
        </div>
    </div>
@endsection