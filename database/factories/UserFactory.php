<?php

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

$factory->define(App\Entities\Pegawai::class, function (Faker $faker) {
    static $password;

    return [
        'nama' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('123456'),
        'remember_token' => str_random(10),
        'status' => ['admin', 'marketing', 'pemilik'][rand(0,1)],
    ];
});

$factory->define(App\Entities\Pelanggan::class, function (Faker $faker) {
    static $password;

    return [
        'nama' => $faker->company,
        'no_telepon' => $faker->phoneNumber,
        'alamat' => $faker->address
    ];
});
