<?php

/** @var Factory $factory */

use App\Category;
use Illuminate\Database\Eloquent\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {

    $iconArray = array('fa fa-cutlery', 'fa fa-scissors', 'fa fa-laptop', 'fa fa-briefcase', 'fa fa-glass', 'fa fa-shopping-bag');
    return [
        'name' => $faker->unique()->word." ".Str::random(3),
        'icon' => $iconArray[array_rand($iconArray)]
    ];
});
