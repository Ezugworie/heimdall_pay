<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use App\Wallet;
use Faker\Generator as Faker;
use \Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;


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
    return [
        'lastname' => $faker->firstName,
        'firstname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(\Illuminate\Support\Str::random(8)),
        'api_token' => \Illuminate\Support\Str::random(32),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});


$factory->define(Wallet::class, function (Faker $faker) {
    return [
        'account_balance' => $faker->randomFloat($min = 200000, $max = 100000),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
