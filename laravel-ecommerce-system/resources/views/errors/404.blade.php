@extends("layouts.master")

@section("title","AnasayfaController")
@section("content")
    <div class="container">
        <div class="jumbotron text-center">
            <h1>404</h1>
            <h2>Aradığınız sayfa bulunamadı belki de hiç var olmamıştır.
            </h2>
            <a href="{{ route("anasayfa") }}" class="btn btn-primary">
               <i class="fa fa-undo"></i> Anasayfaya Dön
            </a>
        </div>
    </div>
@endsection

