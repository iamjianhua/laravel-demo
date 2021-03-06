<?php

use App\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$factory->define(User::class, function (Faker $faker) {

    static $password;
    $now = Carbon::now()->toDateTimeString();

    return [
        'name'           => $faker->name,
        'email'          => $faker->unique()->safeEmail,
        'password'       => $password ?: $password = bcrypt('secret'),
        'introduction'   => $faker->sentence(),
        'remember_token' => str_random(10),
        'created_at'     => $now,
        'updated_at'     => $now,
    ];
});
