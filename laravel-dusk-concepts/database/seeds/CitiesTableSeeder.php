<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            [
                'name'           => 'İstanbul',
            ],
            [
                'name'           => 'Ankara',
            ],
            [
                'name'           => 'İzmir',
            ]
        ];

        City::insert($cities);
    }
}
