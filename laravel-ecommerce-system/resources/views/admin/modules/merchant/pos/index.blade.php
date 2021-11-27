@extends("admin.layouts.master")

@section("title","ETICARET PROJESİ")

@section("content")
    <h1 class="page-header">Pos Yönetimi</h1>

    <h3 class="sub-header"> Pos Listesi </h3>
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
                <th>Pos ID</th>
                <th>Campaign ID</th>
                <th>Allocation ID</th>
                <th>Installments Number</th>
                <th>Card Type</th>
                <th>Card Program</th>
                <th>Card Scheme</th>
                <th>Payable Amount</th>
                <th>Amount To Be Paid</th>
                <th>Currency</th>
                <th>Title</th>
                <th>İşlemler</th>
            </tr>
            </thead>
            <tbody>
            @if(count($poses) == 0)
                <tr>
                    <td align="center" colspan="7">
                        <b>{{ __('No Data') }}</b>
                    </td>
                </tr>
            @endif
            @forelse($poses as $pos)
                <tr>
                    <td>{{ $pos->pos_id }}</td>
                    <td>{{ $pos->campaign_id }}</td>
                    <td>{{ $pos->allocation_id }}</td>
                    <td>{{ $pos->installments_number }}</td>
                    <td>{{ $pos->card_type }}</td>
                    <td>{{ $pos->card_program }}</td>
                    <td>{{ $pos->card_scheme }}</td>
                    <td>{{ $pos->payable_amount }}</td>
                    <td>{{ $pos->amount_to_be_paid }}</td>
                    <td>{{ $pos->currency_code }} ({{ $pos->currency_id }})</td>
                    <td>{{ $pos->title}}</td>
                    <td>Detaylar Yapılacak</td>
{{--                    <td style="width: 100px">--}}
{{--                        <a href="{{route("yonetim.kullanici.duzenle",$pos->id)}}" class="btn btn-xs btn-success"--}}
{{--                           data-toggle="tooltip" data-placement="top" title="DÜZENLE">--}}
{{--                            <span class="fa fa-pencil"></span>--}}
{{--                        </a>--}}
{{--                        <a href="{{route("yonetim.kullanici.sil",$pos->id)}}" class="btn btn-xs btn-danger"--}}
{{--                           data-toggle="tooltip" data-placement="top" title="SİL"--}}
{{--                           onclick="return confirm('Emin Misiniz?')">--}}
{{--                            <span class="fa fa-trash"></span>--}}
{{--                        </a>--}}
{{--                    </td>--}}
                </tr>
            @empty
            @endforelse
            </tbody>
        </table>

    </div>

@endsection
