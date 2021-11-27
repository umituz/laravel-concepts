<?php

/* @var $factory Factory */

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(App\Reservation::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomNumber(),
        'book_id' => $faker->randomNumber(),
        'checked_out_at' => $faker->dateTime(),
        'checked_in_at' => $faker->dateTime(),
    ];
});
