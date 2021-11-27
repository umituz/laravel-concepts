<div class="list-group">
    <a href="{{route("yonetim.anasayfa")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Yönetim Paneli
    </a>
    <a href="{{ route('yonetim.urun') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Ürünler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['urunler'] ?? 0 }}
        </span>
    </a>
    <a href="{{ route('yonetim.kategori') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span>
        Kategoriler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['kategoriler'] ?? 0}}
        </span>
    </a>
    <a href="{{route("yonetim.kullanici.index")}}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Kullanıcılar
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['kullanicilar'] ?? 0 }}
        </span>
    </a>
    <a href="{{ route('yonetim.siparis') }}" class="list-group-item">
        <span class="fa fa-fw fa-dashboard"></span> Siparişler
        <span class="badge badge-dark badge-pill pull-right">
            {{ $istatistikler['bekleyen_siparisler'] ?? 0 }}
        </span>
    </a>
    <a href="#" class="list-group-item collapsed" data-target="#submenu1" data-toggle="collapse" data-parent="#sidebar">
        <span class="fa fa-fw fa-dashboard"></span>
        {{ __('Merchant') }}
        <span class="caret arrow"></span>
    </a>
    <div class="list-group collapse" id="submenu1">
        <a href="{{ route('admin.merchant.pos.index') }}" class="list-group-item">{{ __('Pos') }}</a>
        <a href="{{ route('admin.merchant.commission.index') }}" class="list-group-item">{{ __('Commission') }}</a>
        <a href="{{ route('admin.merchant.checkstatus.index') }}" class="list-group-item">{{ __('Check Status') }}</a>
    </div>
</div>
