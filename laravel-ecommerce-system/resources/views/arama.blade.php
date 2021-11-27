@extends("layouts.master")

@section("title","Arama")

@section("content")
    <div class="container">
        <div class="breadcrumb">
            <li><a href="{{ route("anasayfa") }}">Anasayfa</a></li>
            <li class="active">Arama Sonucu</li>
        </div>
        <div class="products bg-content">
            <div class="row">
                @if(count($urunler) == 0)
                    <div class="col-md-12 text-center">
                        Böyle bir ürün bulunamadı
                    </div>
                @endif
                @foreach($urunler as $urun)
                    <div class="col-md-3 product">
                        <a href="{{ route("urun",$urun->slug) }}">
                            <img src="http://lorempixel.com/400/400/food/1" alt="{{ $urun->urun_ad }}">
                        </a>
                        <p>
                            <a href="{{ route("urun",$urun->slug) }}">{{ $urun->urun_ad }}</a>
                        </p>
                        <p class="price">{{ $urun->fiyat }} ₺</p>
                    </div>
                @endforeach
            </div>
            {{$urunler->appends(["aranan" => old("aranan")])->links()}}
        </div>
    </div>
@endsection