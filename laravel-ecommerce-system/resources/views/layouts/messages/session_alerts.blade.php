@if(session()->has("mesaj"))
    <div class="container">
        <div class="row">
            <div class="alert alert-{{session("mesaj_tur")}}">
                {{session("mesaj")}}
            </div>
        </div>
    </div>
@endif