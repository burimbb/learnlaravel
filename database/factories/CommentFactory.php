<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $user = User::find(rand(1, 5));
    return [
        'body' => $faker->text(50),
        'commentable_id' => $user ?? factory('App\User')->create()->id,
        'commentable_type' => App\User::class,
    ];
});
