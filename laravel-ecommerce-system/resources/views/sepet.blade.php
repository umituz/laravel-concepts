@extends('layouts.master')

@section('title','Sepet')

@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Sepet</h2>
            @include("layouts.messages.session_alerts")
            @if(count(Cart::content()) > 0)
                <table class="table table-bordererd table-hover">
                    <tr>
                        <th colspan="2">Ürün</th>
                        <th>Adet Fiyatı</th>
                        <th>Adet</th>
                        <th>Tutar</th>
                    </tr>
                    @foreach(Cart::content() as $cartItem)
                    <tr>
                        <td style="width:120px;">
                            <a href="{{ route("urun",$cartItem->options->slug ?? '') }}">
                                <img src="http://via.placeholder.com/120x100?text=UrunResmi">
                            </a>
                        </td>
                        <td>
                            <a href="{{ route("urun",$cartItem->options->slug ?? '') }}">
                                {{ $cartItem->name }}
                            </a>
                            <form action="{{ route("sepet.kaldir",$cartItem->rowId) }}" method="post">
                                @csrf
                                @method("delete")
                                <input type="submit" class="btn btn-danger btn-xs" value="Sepetten Kaldır" >
                            </form>
                        </td>
                        <td>{{ $cartItem->price }} ₺</td>
                        <td>
                            <a
                                    data-id="{{$cartItem->rowId}}"
                                    data-adet="{{$cartItem->qty-1}}"
                                    href="#"
                                    class="btn btn-xs btn-default urun-adet-azalt">
                                -
                            </a>
                            <span style="padding: 10px 20px">{{ $cartItem->qty }}</span>
                            <a data-id="{{$cartItem->rowId}}"
                               data-adet="{{$cartItem->qty+1}}"
                               href="#"
                               class="btn btn-xs btn-default urun-adet-arttir">
                                +
                            </a>
                        </td>
                        <td class="text-right">{{ $cartItem->subtotal }}</td>
                    </tr>
                    @endforeach
                    <tr>
                        <th colspan="4" class="text-right">Ara Toplam</th>
                        <td class="text-right">{{ Cart::subtotal() }} ₺</td>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">KDV</th>
                        <td class="text-right">{{ Cart::tax()   }} ₺</td>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Genel Total</th>
                        <td class="text-right">{{ Cart::total() }} ₺</td>
                    </tr>
                </table>
                <div>
                    <form action="{{route("sepet.bosalt")}}" method="post">
                        @csrf
                        @method("delete")
                        <input type="submit" class="btn btn-info pull-left" value="Sepeti Boşalt " />
                    </form>

                    <a href="{{ route("payment.index") }}" class="btn btn-success pull-right btn-lg">Ödeme Yap</a>
                </div>
            @else
               <p>Sepetinizde ürün yok</p>
            @endif
        </div>
    </div>
@endsection

@section("script")
    <script>
        $(function(){
            $(".urun-adet-azalt, .urun-adet-arttir").on("click",function(){
                var id = $(this).attr('data-id');
                var adet = $(this).attr('data-adet');
                $.ajax({
                    type:'PATCH',
                    url:'{{ url("sepet/guncelle") }}/' + id,
                    data:{adet:adet},
                    success:function()
                    {
                        window.location.href='{{ route("sepet") }}'
                    }
                });
            });
        });
    </script>
@endsection
