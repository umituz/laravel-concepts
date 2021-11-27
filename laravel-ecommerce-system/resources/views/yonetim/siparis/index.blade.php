@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Siparişler Yönetimi</h1>

    <h3  class="sub-header"> Sipariş Listesi </h3>
    <div class="well">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary">Yazdır</button>
            <button type="button" class="btn btn-info">Dışarı Aktar</button>
            <a href="{{ route('yonetim.siparis.yeni') }}" class="btn btn-success">Yeni Ekle</a>
        </div>
        <form class="form-inline" action="{{ route("yonetim.siparis") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" value="{{ old("aranan") }}" name="aranan" class="form-control form-control-sm" id="aranan">
            </div>
            <button class="btn btn-primary" type="submit">Ara</button>
            <a href="{{ route("yonetim.siparis") }}" class="btn btn-info">Temizle</a>
        </form>
    </div>

    @include("layouts.messages.session_alerts")

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>Sipariş Kodu</th>
                <th>Ad Soyad</th>
                <th>Telefon</th>
                <th>Tutar</th>
                <th>Durum</th>
                <th>Sipariş Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($siparisler) == 0)
                <tr>
                    <td align="center" colspan="8">
                        <b>KAYIT BULUNAMADI</b>
                    </td>
                </tr>
            @endif
            @foreach($siparisler as $siparis)
            <tr>
                <td>SP-{{$siparis->id}}</td>
                <td>{{$siparis->sepet->kullanici->adsoyad}}</td>
                <td>{{$siparis->telefon}}</td>
                <td>
                    {{$siparis->siparis_tutari * ((100 + config('cart.tax') ) / 100)}}
                </td>
                <td>{{$siparis->durum}}</td>
                <td>{{$siparis->olusturulma_tarihi}}</td>
                <td style="width: 100px">
                    <a href="{{route("yonetim.siparis.duzenle",$siparis->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="DÜZENLE">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route("yonetim.siparis.sil",$siparis->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="SİL" onclick="return confirm('Emin Misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $siparisler->links() }}

    </div>

@endsection