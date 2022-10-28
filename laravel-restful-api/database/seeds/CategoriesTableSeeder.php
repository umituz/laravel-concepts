<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('categories')->truncate();
        DB::table('category_product')->truncate();

        factory(Category::class,10)->create();

//        DB::table('category_product')->insert([
//            ['product_id' => 1, 'category_id' => 1],
//            ['product_id' => 1, 'category_id' => 2],
//            ['product_id' => 2, 'category_id' => 1],
//            ['product_id' => 2, 'category_id' => 2],
//            ['product_id' => 2, 'category_id' => 3],
//        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
