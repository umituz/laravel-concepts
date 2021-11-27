<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFixturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fixtures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('home_club_id');
            $table->unsignedBigInteger('away_club_id');
            $table->integer('week');
            $table->integer('home_club_goal')->default(0);
            $table->integer('away_club_goal')->default(0);
            $table->enum('result', ['home', 'away', 'draw'])->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('home_club_id')->references('id')->on('clubs')->restrictOnDelete();
            $table->foreign('away_club_id')->references('id')->on('clubs')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fixtures');
    }
}
