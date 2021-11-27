<div class="list-group">
    <a href="{{route("yonetim.anasayfa")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Yönetim Paneli
    </a>
    <a href="{{ route('yonetim.urun') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Ürünler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['urunler'] }}
        </span>
    </a>
    <a href="{{ route('yonetim.kategori') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Kategoriler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['kategoriler'] }}
        </span>
    </a>
    <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar">
        <span class="fa fa-fw fa-dashboard"></span>
        Kategori Ürünleri
        {{--<span class="caret arrow"></span>--}}
    </a>
    {{--<div class="list-group collapse" id="submenu1">--}}
        {{--<a href="#" class="list-group-item">Elektronik</a>--}}
        {{--<a href="#" class="list-group-item">Kitap</a>--}}
    {{--</div>--}}
    <a href="{{route("yonetim.kullanici.index")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['kullanicilar'] }}
        </span>
    </a>
    <a href="{{ route('yonetim.siparis') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Siparişler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['bekleyen_siparisler'] }}
        </span>
    </a>
</div>