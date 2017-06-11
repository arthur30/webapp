<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Tourist::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'first_name' => $faker->firstName,
        'family_name' => $faker->lastName,
        'nationality' => $faker->country,
        'phone_number' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Guide::class, function (Faker\Generator $faker) {
    static $password;

    $first_name = $faker->firstName;
    $family_name = $faker->lastName;

    return [
        'name' => $first_name . ' ' . $family_name,
        'first_name' => $first_name,
        'family_name' => $family_name,
        'nationality' => $faker->country,
        'home_town' => $faker->city,
        'phone_number' => "123",
        'education' => $faker->month, // just forced
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});