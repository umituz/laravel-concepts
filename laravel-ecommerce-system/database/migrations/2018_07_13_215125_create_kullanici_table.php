<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKullaniciTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kullanici', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adsoyad', 60);
            $table->string('email', 160)->unique();
            $table->string('sifre', 100);
            $table->string('aktivasyon_anahtari', 100)->nullable();
            $table->boolean('aktif_mi')->default(0);
            $table->boolean('yonetici_mi')->default(0);
            $table->rememberToken();
            $table->tinyInteger('payment_method')->default(1)->comment('0 : 2D, 1 : 3D');

            $table->timestamp("olusturulma_tarihi")
                ->default(DB::raw("CURRENT_TIMESTAMP"));
            $table->timestamp("guncellenme_tarihi")
                ->default(DB::raw("CURRENT_TIMESTAMP on UPDATE CURRENT_TIMESTAMP"));
            $table->timestamp("silinme_tarihi")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kullanici');
    }
}
