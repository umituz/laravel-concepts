@extends('layouts.master')
@section('title','Ödeme Bilgileri')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>Ödeme</h2>
            <form action="{{ route("payment.make") }}" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-5">
                        <h3>Ödeme Bilgileri</h3>
                        <div class="form-group">
                            <label for="cc_holder_name">Kredi Kartı Sahibi</label>
                            <input type="text" class="form-control" id="cc_holder_name" name="cc_holder_name"
                                   style="font-size:20px;" >
                        </div>
                        <div class="form-group">
                            <label for="cc_no">Kredi Kartı Numarası</label>
                            <input type="text" class="form-control kredikarti" id="cc_no" name="cc_no"
                                   style="font-size:20px;" >
                        </div>
                        <div class="form-group">
                            <label for="expiry_month">Son Kullanma Tarihi</label>
                            <div class="row">
                                <div class="col-md-6">
                                    Ay
                                    <select name="expiry_month" id="expiry_month"
                                            class="form-control" >
                                        @for($i=1;$i<=12;$i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    Yıl
                                    <select name="expiry_year" class="form-control" required>
                                        @for($i=$currentYear;$i<=2030;$i++)
                                            <option>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cvv">CVV (Güvenlik Numarası)</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control cvv" name="cvv" id="cvv"
                                           >
                                </div>
                            </div>
                        </div>
                        <form>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Ön bilgilendirme formunu okudum ve kabul
                                        ediyorum.</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input type="checkbox" checked> Mesafeli satış sözleşmesini okudum ve kabul
                                        ediyorum.</label>
                                </div>
                            </div>
                        </form>
                        <button type="submit" class="btn btn-success btn-lg">Ödeme Yap</button>
                    </div>
                    <div class="col-md-7">
                        <h4>Ödenecek Tutar</h4>
                        <span class="price">{{ Cart::total() }} <small>TL</small></span>

                        <h4>İletişim Bilgileri</h4>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="adsoyad">Ad Soyad</label>
                                    <input type="text" name="adsoyad" value="{{ auth()->user()->adsoyad }}"
                                           class="form-control" id="adsoyad" >
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="telefon">Telefon</label>
                                    <input type="text" name="telefon" value="{{ $userDetail->telefon }}"
                                           class="form-control" id="telefon" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="adres">Adres</label>
                                    <input type="text" name="adres" value="{{ $userDetail->adres }}"
                                           class="form-control" id="adres" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.js"></script>
    <script>
        $('.kredikarti').mask('0000-0000-0000-0000', {placeholder: "____-____-____-____"});
        $('.cvv').mask('000', {placeholder: "___"});
        $('.telefon').mask('(000) 000-00-00', {placeholder: "(___) ___-__-__"});
    </script>
@endsection
