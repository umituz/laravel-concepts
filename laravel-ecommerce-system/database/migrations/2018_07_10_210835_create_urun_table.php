<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUrunTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('urun', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug');
            $table->string('urun_ad');
            $table->text('aciklama');
            $table->decimal('fiyat',10, 3);
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
        Schema::dropIfExists('urun');
    }
}
