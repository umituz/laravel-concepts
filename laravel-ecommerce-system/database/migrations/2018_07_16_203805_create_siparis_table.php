<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiparisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siparis', function (Blueprint $table) {
            $table->increments('id');
            $table->unique("sepet_id");
            $table->integer('sepet_id')->unsigned();
            $table->foreign("sepet_id")
                ->references("id")
                ->on("sepet")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->decimal('siparis_tutari',10,4);
            $table->string("durum",30)->nullable();
            $table->string("banka")->nullable();
            $table->integer("taksit_sayisi")->nullable();

            $table->string("adsoyad",30)->nullable();
            $table->string("adres",200)->nullable();
            $table->string("telefon",15)->nullable();

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
        Schema::dropIfExists('siparis');
    }
}
