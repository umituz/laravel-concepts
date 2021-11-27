<?php

namespace Database\Seeders;

use App\Enumerations\ClubEnumeration;
use App\Models\Club;
use App\Repositories\ClubRepository;
use Illuminate\Database\Seeder;

class ClubsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
         (new ClubRepository(new Club()))->createClubsWithFactory();
    }
}
