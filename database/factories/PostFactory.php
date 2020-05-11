<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->paragraph(2),
        'body' => $faker->paragraph(10),
        'active' => $faker->boolean(),
        'published_at' => $faker->dateTime(),
    ];
});
