<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Urun;
use App\Models\UrunDetay;

/**
 * Class UrunTableSeeder
 * @package Database\Seeders
 */
class UrunTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Urun::truncate();
        UrunDetay::truncate();
        for ($i = 0; $i <= 50; $i++) {
            $urun_ad = 'Ürün Test + ' . $i;
            $urun = Urun::create([
                "urun_ad" => $urun_ad,
                "slug" => str_slug($urun_ad),
                "aciklama" => 'Ürün Test Açıklama  + ' . $i,
                "fiyat" => rand(1, 50)
            ]);
            $detay = $urun->detay()->create([
                "goster_slider" => rand(0, 1),
                "goster_gunun_firsati" => rand(0, 1),
                "goster_one_cikan" => rand(0, 1),
                "goster_cok_satan" => rand(0, 1),
                "goster_indirimli" => rand(0, 1)
            ]);
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
