<?php

use Illuminate\Database\Seeder;

class TestsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('tests')->delete();
        
        \DB::table('tests')->insert(array (
            0 => 
            array (
                'id' => 1,
            ),
        ));
        
        
    }
}