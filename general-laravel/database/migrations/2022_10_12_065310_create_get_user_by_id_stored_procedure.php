<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGetUserByIdStoredProcedure extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $getUserById = "
            DROP PROCEDURE IF EXISTS `get_user_by_id`;
            CREATE PROCEDURE `get_user_by_id` (IN idx int)
            BEGIN select * from users where id = idx;
            END;
        ";

        DB::unprepared($getUserById);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('get_user_by_id_stored_procedure');
    }
}
