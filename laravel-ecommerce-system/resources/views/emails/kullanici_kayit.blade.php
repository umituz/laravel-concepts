<h1>{{config("app.name")}}</h1>
<p>
    İyi Günler! İyi Haberler Var Bugünden! <br>
    Sisteminize {{$kullanici->adsoyad}} kaydoldu. Hadi bahalım <br>
    Kaydınızı aktifleştirmek için <a href="{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}">tıklayın</a> veya aşağıda yer alan
    linki tarayıcınızda açın...
</p>
<p>{{config('app.url')}}/kullanici/aktiflestir/{{$kullanici->aktivasyon_anahtari}}</p>