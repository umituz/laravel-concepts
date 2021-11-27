@extends("yonetim.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Kategoriler Yönetimi</h1>

    <h3  class="sub-header"> Kategori Listesi </h3>
    <div class="well">
        <div class="btn-group pull-right">
            <button type="button" class="btn btn-primary">Yazdır</button>
            <button type="button" class="btn btn-info">Dışarı Aktar</button>
            <a href="{{ route('yonetim.kategori.yeni') }}" class="btn btn-success">Yeni Ekle</a>
        </div>
        <form class="form-inline" action="{{ route("yonetim.kategori") }}" method="post">
            @csrf
            <div class="form-group">
                <label for="aranan">ARA</label>
                <input type="text" value="{{ old("aranan") }}" name="aranan" class="form-control form-control-sm" id="aranan">
                <label for="ust_kategori_id">ÜST KATEGORİ</label>
                <select name="ust_kategori_id" id="ust_kategori_id" class="form-control">
                    <option value="">SEÇİNİZ</option>
                    @foreach($ana_kategoriler as $ana_kategori)
                        <option value="{{ $ana_kategori->id }}" {{ (old("ust_kategori_id") == $ana_kategori->id) ? 'selected' : null }}>
                            {{ $ana_kategori->kategori_ad }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary" type="submit">Ara</button>
            <a href="{{ route("yonetim.kategori") }}" class="btn btn-info">Temizle</a>
        </form>
    </div>

    @include("layouts.messages.session_alerts")

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Slug</th>
                <th>Kategori Adı</th>
                <th>Üst Kategori Adı</th>
                <th>Kayıt Tarihi</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($kategoriler) == 0)
                    <tr>
                        <td align="center" colspan="6">
                            <b>KAYIT BULUNAMADI</b>
                        </td>
                    </tr>
            @endif
            @foreach($kategoriler as $kategori)
            <tr>
                <td>{{$kategori->id}}</td>
                <td>{{$kategori->slug}}</td>
                <td>{{$kategori->kategori_ad}}</td>
                <td>{{$kategori->ust_kategori->kategori_ad}}</td>
                <td>{{$kategori->olusturulma_tarihi}}</td>
                <td style="width: 100px">
                    <a href="{{route("yonetim.kategori.duzenle",$kategori->id)}}" class="btn btn-xs btn-success" data-toggle="tooltip" data-placement="top" title="DÜZENLE">
                        <span class="fa fa-pencil"></span>
                    </a>
                    <a href="{{route("yonetim.kategori.sil",$kategori->id)}}" class="btn btn-xs btn-danger" data-toggle="tooltip" data-placement="top" title="SİL" onclick="return confirm('Emin Misiniz?')">
                        <span class="fa fa-trash"></span>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $kategoriler->links() }}

    </div>

@endsection