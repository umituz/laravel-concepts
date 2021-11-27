<?php

/** @var Factory $factory */

use App\User;
use Faker\Generator as Faker;
use App\UserAddress;
use Illuminate\Database\Eloquent\Factory;

$factory->define(UserAddress::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'country' => $faker->country()
    ];
});
