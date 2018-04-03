<?php

use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(App\Models\Student::class, function (Faker $faker) {
    static $password;
    $now = Carbon::now()->toDateTimeString();

    return [
        'number' => $faker->randomNumber(),
        'class' => $faker->randomNumber(),
        'name' => $faker->name,
        'password' => $password ?: $password = bcrypt('password'),
        'created_at' => $now,
        'updated_at' => $now,
    ];
});
