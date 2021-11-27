<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'author_id' => $faker->randomNumber(),
    ];
});
