<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSepetUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sepet_urun', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sepet_id')->unsigned();
            $table->foreign("sepet_id")
                ->references("id")
                ->on("sepet")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->integer('urun_id')->unsigned();
            $table->foreign("urun_id")
                ->references("id")
                ->on("urun")
                ->onDelete("cascade")
                ->onUpdate("cascade");

            $table->integer('adet');
            $table->decimal('fiyat',10,2);
            $table->string("durum",30);

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
        Schema::dropIfExists('sepet_urun');
    }
}
