<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

/**
 * Class KategoriTableSeeder
 */
class KategoriTableSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("kategori")->truncate();
        $id = DB::table("kategori")->insertGetId(["kategori_ad" => "Elektronik","slug" => "elektronik"]);
        DB::table("kategori")->insert(["kategori_ad" => "Bilgisayar/Table","slug" => "bilgisayar-table","ust_kategori_id" => $id]);
        DB::table("kategori")->insert(["kategori_ad" => "Telefon","slug" => "telefon","ust_kategori_id" => $id]);

        $id = DB::table("kategori")->insertGetId(["kategori_ad" => "Kitap","slug" => "kitap"]);
        DB::table("kategori")->insert(["kategori_ad" => "Edebiyat Kitapları","slug" => "edebiyat-kitaplari","ust_kategori_id" => $id]);
        DB::table("kategori")->insert(["kategori_ad" => "FelsefeKitapları","slug" => "felsefe-kitaplari","ust_kategori_id" => $id]);
        DB::table("kategori")->insert(["kategori_ad" => "Bilişim Kitapları","slug" => "bilisim-kitaplari","ust_kategori_id" => $id]);

        DB::table("kategori")->insert(["kategori_ad" => "Sinema","slug" => "sinema"]);
        DB::table("kategori")->insert(["kategori_ad" => "Sanat","slug" => "sanat"]);
        DB::table("kategori")->insert(["kategori_ad" => "Bilim","slug" => "bilim"]);
        DB::table("kategori")->insert(["kategori_ad" => "Bilişim","slug" => "bilisim"]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
