@extends('layouts.master')
@section('title','Ödeme Başarılı')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>{{ __('Successful Payment') }}</h2>

            @include('modules.payment.partials.return_data',$data)

        </div>
    </div>
@endsection

