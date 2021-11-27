<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use App\Models\Kullanici;
use App\Models\KullaniciDetay;

/**
 * Class KullaniciTableSeeder
 * @package Database\Seeders
 */
class KullaniciTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Kullanici::truncate();
        KullaniciDetay::truncate();

        $kullanici_yonetici = Kullanici::create([
            "adsoyad" => "Ümit Kenan UZ",
            "email" => "umituz998@gmail.com",
            "sifre" => bcrypt("123456"),
            "aktif_mi"  => 1,
            "yonetici_mi"   => 1
        ]);

        $kullanici_yonetici->detay()->create([
            "adres" => "İstanbul",
            "telefon" => "99999999"
        ]);

//        for($i=0; $i<=500; $i++)
//        {
//            $kullanici_musteri = Kullanici::create([
//                "adsoyad"       => $faker->name,
//                "email"         => $faker->unique()->safeEmail,
//                "sifre"         => bcrypt("159538"),
//                "aktif_mi"      => 1,
//                "yonetici_mi"   => 0
//            ]);
//
//            $kullanici_musteri->detay()->create([
//                "adres"         => $faker->address,
//                "telefon"       => $faker->e164PhoneNumber
//            ]);
//        }


        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
