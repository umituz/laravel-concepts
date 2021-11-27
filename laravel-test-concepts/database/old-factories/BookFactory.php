<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\{Book, Author};
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'author_id' => factory(Author::class),

    ];
});
