@extends("admin.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Komisyon Yönetimi</h1>

    <h3 class="sub-header"> Komisyon Listesi </h3>
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
                <input type="text" value="{{ old("aranan") }}" name="aranan" class="form-control form-control-sm"
                       id="aranan">
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
                <th>Card Program</th>
                <th>Merchant Commission Percentage</th>
                <th>Merchant Commission Fixed</th>
                <th>User Commission Percentage</th>
                <th>User Commission Fixed</th>
                <th>Currency Code</th>
                <th>Installment</th>
            </tr>
            </thead>
            <tbody>
            @if(count($commissions) == 0)
                <tr>
                    <td align="center" colspan="7">
                        <b>{{ __('No Data') }}</b>
                    </td>
                </tr>
            @endif
            @forelse($commissions as $index => $commission)
                <tr>
                    <td>
                        {{ $index }} . {{ __('Installments') }}

                @forelse($commission as $com)
                    <tr>
                        <td>{{ $com->card_program }}</td>
                        <td>{{ $com->merchant_commission_percentage }}</td>
                        <td>{{ $com->merchant_commission_fixed }}</td>
                        <td>{{ $com->user_commission_percentage }}</td>
                        <td>{{ $com->user_commission_fixed }}</td>
                        <td>{{ $com->currency_code }}</td>
                        <td>{{ $com->installment }}</td>
                    </tr>
                    @empty
                    @endforelse

                    </td>
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>

@endsection
