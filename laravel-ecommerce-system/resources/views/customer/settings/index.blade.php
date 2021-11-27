@extends('layouts.master')
@section('title','Siparis')
@section('content')
    <div class="container">
        <div class="bg-content">
            <h2>{{ __('Settings') }}</h2>
            @include("layouts.messages.session_alerts")
        </div>

        <form action="{{ route('customer.settings.update') }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <div class="row">
                    <div class="col-md-3">
                        <label for="payment_method">{{ __('Payment Method') }}</label>
                        <select name="payment_method" id="payment_method" class="form-control" required>
                            <option value="1" {{ $paymentMethod == 1 ? 'selected' : '' }}>3D</option>
                            <option value="0" {{ $paymentMethod == 0 ? 'selected' : '' }}>2D</option>
                        </select>
                    </div>
                </div>

                <br>
                <button type="submit" class="btn btn-success ">{{ __('Save') }}</button>

            </div>
        </form>

    </div>
@endsection
