<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Degree;
use App\Department;
use App\Lecturer;
use Faker\Generator as Faker;

$factory->define(Lecturer::class, function (Faker $faker) {
    $department = Department::all()->random();
    $degree = Degree::all()->random();
    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'middle_name' => $faker->firstName(),
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->email,
        'department_id' => $department ? $department->id : factory('App\Department', 5)->create()->first()->id,
        'degree_id' => $degree ? $degree->id : factory('App\Degree', 5)->create()->first()->id,
    ];
});
