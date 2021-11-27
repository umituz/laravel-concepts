@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Kullanıcılar Yönetimi</h1>

    <form method="post" action="{{route("yonetim.kullanici.kaydet",@$kullanici->id)}}">
        @csrf
        <div class="pull-right">
            <button type="submit" class="btn btn-primary">
                {{@$kullanici->id > 0 ? 'Güncelle' : 'Kaydet'}}
            </button>
        </div>
        <h2 class="sub-header">
            Kullanıcı {{@$kullanici->id > 0 ? 'Düzenle' : 'Ekle'}}
        </h2>

        @include("layouts.messages.validation_errors")
        @include("layouts.messages.session_alerts")

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input name="email" type="email" value="{{ old("email",@$kullanici->email) }}" class="form-control" id="email" placeholder="E-posta Adresiniz">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="adsoyad">Ad Soyad</label>
                    <input name="adsoyad" type="text" value="{{ old("adsoyad",@$kullanici->adsoyad) }}" class="form-control" id="adsoyad" placeholder="Adınız ve Soyadınız">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="password">Password</label>
                    <input name="sifre" type="password" class="form-control" id="password" placeholder="Şifreniz">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="telefon">Telefon</label>
                    <input name="telefon" type="text" value="{{old("telefon",@$kullanici->detay->telefon) }}" class="form-control" id="telefon" placeholder="Telefon Numarannız">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="adres">Adres</label>
                    <input name="adres" type="text" value="{{ old("adres",@$kullanici->detay->adres) }}" class="form-control" id="adres" placeholder="Adresiniz">
                </div>
            </div>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="aktif_mi" value="0">
                <input name="aktif_mi" type="checkbox" {{ old("aktif_mi",@$kullanici->aktif_mi) ? 'checked' : null }} name="aktif_mi" value="1"> Kullanıcıyı Aktif Et
            </label>
        </div>
        <div class="checkbox">
            <label>
                <input type="hidden" name="yonetici_mi" value="0">
                <input name="yonetici_mi" type="checkbox" {{ old("yonetici_mi",@$kullanici->yonetici_mi) ? 'checked' : null }} name="yonetici_mi" value="1"> Kullanıcıyı Yönetici Yap
            </label>
        </div>
    </form>

@endsection