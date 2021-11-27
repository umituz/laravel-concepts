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
     * @param \Faker\Generator $faker
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
//        factory(Category::class,20)->create();

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        DB::table('categories')->truncate();
        DB::table('category_product')->truncate();

        for ($i = 0; $i < 20; $i++) {

            $categoryName = rtrim($faker->sentence(3), '.');

            Category::create([
                'name' => $categoryName,
                'slug' => Str::slug($categoryName)
            ]);

        }

        DB::table('category_product')->insert([
            ['product_id' => 1, 'category_id' => 1],
            ['product_id' => 1, 'category_id' => 2],
            ['product_id' => 2, 'category_id' => 1],
            ['product_id' => 2, 'category_id' => 2],
            ['product_id' => 2, 'category_id' => 3],
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1');

    }
}
