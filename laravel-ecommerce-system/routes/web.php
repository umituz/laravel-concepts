<?php

Route::group(["prefix" => "yonetim", "namespace" => "Yonetim"], function () {
    Route::redirect("/", "/yonetim/oturumac");
    Route::match(["get", "post"], "/oturumac", "KullaniciController@oturumac")->name("yonetim.oturumac");

    Route::group(["middleware" => "yonetim"], function () {

        Route::get("/anasayfa", "AnasayfaController@index")->name("yonetim.anasayfa");
        Route::get("/otumukapat", "KullaniciController@oturumukapat")->name("yonetim.oturumukapat");

        Route::group(["prefix" => "kullanici"], function () {
            Route::match(["get", "post"], "/", "KullaniciController@index")->name("yonetim.kullanici.index");
            Route::get("/yeni", "KullaniciController@form")->name("yonetim.kullanici.yeni");
            Route::get("/duzenle/{id}", "KullaniciController@form")->name("yonetim.kullanici.duzenle");
            Route::post("/kaydet/{id?}", "KullaniciController@kaydet")->name("yonetim.kullanici.kaydet");
            Route::get("/sil/{id}", "KullaniciController@sil")->name("yonetim.kullanici.sil");
        });

        Route::group(["prefix" => "kategori"], function () {
            Route::match(["get", "post"], "/", "KategoriController@index")->name("yonetim.kategori");
            Route::get("/yeni", "KategoriController@form")->name("yonetim.kategori.yeni");
            Route::get("/duzenle/{id}", "KategoriController@form")->name("yonetim.kategori.duzenle");
            Route::post("/kaydet/{id?}", "KategoriController@kaydet")->name("yonetim.kategori.kaydet");
            Route::get("/sil/{id}", "KategoriController@sil")->name("yonetim.kategori.sil");
        });

        Route::group(["prefix" => "urun"], function () {
            Route::match(["get", "post"], "/", "UrunController@index")->name("yonetim.urun");
            Route::get("/yeni", "UrunController@form")->name("yonetim.urun.yeni");
            Route::get("/duzenle/{id}", "UrunController@form")->name("yonetim.urun.duzenle");
            Route::post("/kaydet/{id?}", "UrunController@kaydet")->name("yonetim.urun.kaydet");
            Route::get("/sil/{id}", "UrunController@sil")->name("yonetim.urun.sil");
        });

        Route::group(["prefix" => "siparis"], function () {
            Route::match(["get", "post"], "/", "SiparisController@index")->name("yonetim.siparis");
            Route::get("/yeni", "SiparisController@form")->name("yonetim.siparis.yeni");
            Route::get("/duzenle/{id}", "SiparisController@form")->name("yonetim.siparis.duzenle");
            Route::post("/kaydet/{id?}", "SiparisController@kaydet")->name("yonetim.siparis.kaydet");
            Route::get("/sil/{id}", "SiparisController@sil")->name("yonetim.siparis.sil");
        });

    });

});

Route::group(["prefix" => "admin", "namespace" => "Admin", "middleware" => "yonetim",'as' => 'admin.'], function () {

    Route::group(["prefix" => "merchant", 'namespace' => 'Merchant', 'as' => 'merchant.'], function () {
        Route::group(["prefix" => "pos", 'as' => 'pos.'], function () {
            Route::get("/", "PosController@index")->name("index");
        });
        Route::group(["prefix" => "commission", 'as' => 'commission.'], function () {
            Route::get("/", "CommissionController@index")->name("index");
        });
        Route::group(["prefix" => "checkstatus", 'as' => 'checkstatus.'], function () {
            Route::get("/", "CheckStatusController@index")->name("index");
        });
    });

});


Route::get("/", "AnasayfaController@index")->name('anasayfa');

Route::get("/kategori/{kategori_adi}", "KategoriController@index")->name('kategori');

Route::get("/urun/{urun_adi}", "UrunController@index")->name('urun');

Route::post("/ara", "UrunController@ara")->name("ara");
Route::get("/ara", "UrunController@ara")->name("ara");

Route::group(["prefix" => "sepet"], function () {
    Route::get("/", "SepetController@index")->name('sepet');
    Route::post("/ekle", "SepetController@ekle")->name("sepet.ekle");
    Route::delete("/kaldir/{rowId}", "SepetController@kaldir")->name("sepet.kaldir");
    Route::delete("/bosalt", "SepetController@bosalt")->name("sepet.bosalt");
    Route::patch("/guncelle/{rowId}", "SepetController@guncelle")->name("sepet.guncelle");
});

Route::group(['prefix' => 'payment', 'as' => 'payment.'], function () {
    Route::get("/", "PaymentController@index")->name('index');
    Route::post("/make", "PaymentController@makePayment")->name('make');
    Route::get("/successful", "PaymentController@successful")->name('successful');
    Route::get("/fail", "PaymentController@fail")->name('fail');
});

Route::group(["middleware" => "auth"], function () {
    Route::get("/siparis", "SiparisController@index")->name('siparis');
    Route::get("/siparis/{id}", "SiparisController@detay")->name("siparis.detay");

    Route::group(['prefix' => 'settings', 'as' => 'customer.settings.', 'namespace' => 'Customer'], function () {
        Route::get('/', 'SettingsController@index')->name('index');
        Route::put('/update', 'SettingsController@update')->name('update');
    });

});

Route::group(["prefix" => "kullanici"], function () {
    Route::get("/oturumac", "KullaniciController@giris_form")->name("kullanici.oturumac");
    Route::post("/oturumac", "KullaniciController@giris")->name("kullanici.oturumac");
    Route::get("/kaydol", "KullaniciController@kaydol_form")->name("kullanici.kaydol");
    Route::post("/kaydol", "KullaniciController@kaydol")->name("kullanici.kaydol");
    Route::get("/aktiflestir/{anahtar}", "KullaniciController@aktiflestir")->name("aktiflestir");
    Route::get("/oturumukapat", "KullaniciController@oturumukapat")->name("kullanici.oturumukapat");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
