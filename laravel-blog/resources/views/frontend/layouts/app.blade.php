<!DOCTYPE html>
<html lang="{{ ConfigHelper::getLocale() }}">
<head>
    @include('frontend.layouts.head')
</head>
<body style="color:black">
@include('frontend.layouts.header')
@section('content')
@show
@include('frontend.layouts.footer')
</body>
</html>
