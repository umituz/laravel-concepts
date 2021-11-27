<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('backend.layouts.head')
    @stack('css')
</head>
<body>
    <div id="app">
        @include('backend.layouts.navbar')
        <main class="py-4">
            @yield('content')
        </main>
    </div>
    @stack('js')
</body>
</html>
