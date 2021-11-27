@extends('layouts.master')
@section('title','Ödeme Başarısız')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>{{ __('Fail Payment') }}</h2>

            @include('modules.payment.partials.return_data',$data)

        </div>
    </div>
@endsection

