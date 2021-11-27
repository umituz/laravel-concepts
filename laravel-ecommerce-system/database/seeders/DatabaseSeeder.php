<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

/**
 * Class DatabaseSeeder
 * @package Database\Seeders
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UrunTableSeeder::class);
        $this->call(KategoriTableSeeder::class);
        $this->call(DilTableSeeder::class);
        $this->call(KullaniciTableSeeder::class);
    }
}
