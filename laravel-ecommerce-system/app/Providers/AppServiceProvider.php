<?php

namespace App\Providers;

use App\Models\Ayar;
use App\Models\Urun;
use App\Models\Kullanici;
use App\Models\Kategori;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Siparis;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        View::composer(["yonetim.*"],function($view){
            $bitisZamani = now()->addMinutes(10);
            $istatistikler = Cache::remember("istatistikler",$bitisZamani,function(){
                return [
                    'bekleyen_siparisler'   => Siparis::where("durum","Siparişiniz Alındı")->count(),
                    'tamamlanan_siparisler' => Siparis::where("durum","Siparişiniz Tamamlandı")->count(),
                    'urunler'               => Urun::count(),
                    'kullanicilar'          => Kullanici::where("aktif_mi",1)->where("yonetici_mi",0)->count(),
                    'kategoriler'           => Kategori::where("ust_kategori_id",1)->count()
                ];
            });
            $view->with("istatistikler",$istatistikler);
        });

        if(Schema::hasTable('ayar'))
        {
            foreach(Ayar::all() as $ayar)
            {
                Config::set("ayar.".$ayar->anahtar,$ayar->deger);
            }
        }


    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
