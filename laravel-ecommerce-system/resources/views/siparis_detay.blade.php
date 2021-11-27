@extends('layouts.master')

@section('title','Siparis Detay')
@section('content')
    <div class="container">
        <div class="bg-content">
            <a href="{{ route("siparis") }}" class="btn btn-xs btn-primary">
                <i class="glyphicon glyphicon-arrow-left"></i> Sipariş Listesine Dön
            </a>
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
                                <img src="{{ $sepet_urun->urun->detay->urun_resmi }}"
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
