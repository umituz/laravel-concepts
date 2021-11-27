@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Kullanıcılar Yönetimi</h1>

    <h3  class="sub-header"> Kullanıcı Listesi </h3>
    <div class="well">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary">Yazdır</button>
            <button type="button" class="btn btn-info">Dışarı Aktar</button>
            <a href="{{ route('yonetim.kullanici.yeni') }}" class="btn btn-success">Yeni Ekle</a>
        </div>
        <form class="form-inline" action="{{ route("yonetim.kullanici.index") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="aranan">Ara</label>
                <input type="text" value="{{ old("aranan") }}" name="aranan" class="form-control form-control-sm" id="aranan">
            </div>
            <button class="btn btn-primary" type="submit">Ara</button>
            <a href="{{ route("yonetim.kullanici.index") }}" class="btn btn-info">Temizle</a>
        </form>
    </div>

    @include("layouts.messages.session_alerts")

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Ad Soyad</th>
                <th>Mail Adresi</th>
                <th>Aktif Mi</th>
                <th>Yönetici Mi</th>
                <th>Kayıt Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($kullanicilar) == 0)
                <tr>
                    <td align="center" colspan="7">
                        <b>KAYIT BULUNAMADI</b>
                    </td>
                </tr>
            @endif
            @foreach($kullanicilar as $kullanici)
            <tr>
                <td>{{$kullanici->id}}</td>
                <td>{{$kullanici->adsoyad}}</td>
                <td>{{$kullanici->email}}</td>
                <td>
                    @if($kullanici->aktif_mi)
                        <span class="label label-success">AKTİF</span>
                    @else
                        <span class="label label-warning">PASİF</span>
                    @endif
                </td>
                <td>
                    @if($kullanici->yonetici_mi)
                        <span class="label label-success">YÖNETİCİ</span>
                    @else
                        <span class="label label-info">KULLANICI</span>
                    @endif
                </td>
                <td>{{$kullanici->olusturulma_tarihi}}</td>
                <td style="width: 100px">
                    <a href="{{route("yonetim.kullanici.duzenle",$kullanici->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="DÜZENLE">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route("yonetim.kullanici.sil",$kullanici->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="SİL" onclick="return confirm('Emin Misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $kullanicilar->links() }}

    </div>

@endsection