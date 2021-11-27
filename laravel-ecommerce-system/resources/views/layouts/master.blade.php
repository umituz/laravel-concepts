<!DOCTYPE html>
<html lang="{{ config("app.locale") }}">
<head>
    @include("layouts.partials.head")
    @yield("style")
</head>
<body>
<div id="ecommerce">
    @include('layouts.partials.navbar')
    @yield('content')
    @include('layouts.partials.footer')
</div>
@include("layouts.partials.script")
@yield("script")
</body>
</html>
