<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apple;
use Faker\Generator as Faker;

$factory->define(Apple::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(),
        'active' => random_int(0,1),
    ];
});
