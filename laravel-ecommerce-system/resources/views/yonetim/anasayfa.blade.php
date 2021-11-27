@extends("yonetim.layouts.master")

@section("title","AnasayfaController")

@section("content")
    <h1 class="page-header">E-ticaret Projesine Hoşgeldiniz</h1>

    <section class="row text-center placeholders">
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Bekleyen Siparişler</div>
                <div class="panel-body">
                    <h4>{{ $istatistikler['bekleyen_siparisler'] }}</h4>
                    <p>Adet</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Ana Kategoriler</div>
                <div class="panel-body">
                    <h4>{{ $istatistikler['kategoriler'] }}</h4>
                    <p>Tane</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Ürün</div>
                <div class="panel-body">
                    <h4>{{ $istatistikler['urunler'] }}</h4>
                    <p>Tane</p>
                </div>
            </div>
        </div>
        <div class="col-6 col-sm-3">
            <div class="panel panel-primary">
                <div class="panel-heading">Kullanıcı</div>
                <div class="panel-body">
                    <h4>{{ $istatistikler['kullanicilar'] }}</h4>
                    <p>Kişi</p>
                </div>
            </div>
        </div>
    </section>
    <section class="row">
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Çok Satan Ürünler
                </div>
                <div class="panel-body">
                    <canvas id="cok_satan_grafik"></canvas>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="panel panel-primary">
                <div class="panel-heading text-center">
                    Aylara Göre Satışlar
                </div>
                <div class="panel-body">
                    <canvas id="aylara_gore_satis_grafik"></canvas>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("admin_scripts")
    <script src="/js/chart.min.js"></script>
    <script>

        @php
            $labels = "";
            $data = "";
            foreach($cok_satan_urunler as $cok_satan_urun)
            {
                $labels .= "\"$cok_satan_urun->urun_ad\", ";
                $data .= "$cok_satan_urun->adet, ";
            }
        @endphp

        var ctx1 = document.getElementById("cok_satan_grafik").getContext('2d');
        var cok_satan_grafik = new Chart(ctx1, {
            type: 'horizontalBar',
            data: {
                labels: [{!! $labels !!}],
                datasets: [{
                    label: 'Çok Satan Ürünler',
                    data: [{!! $data !!}],
                    borderColor: 'rgb(255,99,132)',
                    borderWidth: 1
                }]
            },
            options: {
                legend:{
                    display:false
                },
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize:1
                        }
                    }]
                }
            }
        });

        @php
            $labels = "";
            $data = "";
            foreach($aylara_gore_satislar as $aylara_gore_satis)
            {
                $labels .= "\"$aylara_gore_satis->ay\", ";
                $data .= "$aylara_gore_satis->adet, ";
            }
        @endphp

        var ctx2 = document.getElementById("aylara_gore_satis_grafik").getContext('2d');
        var aylara_gore_satis_grafik = new Chart(ctx2, {
            type: 'line',
            data: {
                labels: [{!! $labels !!}],
                datasets: [{
                    label: 'Aylara Göre Satışlar',
                    data: [{!! $data !!}],
                    borderColor: '#f4645f',
                    borderWidth: 1
                }]
            },
            options: {
                legend:{
                    display:false
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true,
                            stepSize:1
                        }
                    }]
                }
            }
        });
    </script>
@endsection