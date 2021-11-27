<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ust_kategori_id')->nullable();
            $table->string('kategori_ad',30);
            $table->string('slug',50);
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
        Schema::dropIfExists('kategori');
    }
}
