<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(2),
        'body' => $faker->paragraph(5),
        'active' => random_int(0, 1),
    ];
});
