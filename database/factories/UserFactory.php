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

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'nama_band' => $faker->userName,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'alamat' => $faker->streetAddress,
        'no_telp' => $faker->name,
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\pengurus::class, function (Faker $faker) {
    static $password;

    return [
        'nama_pengurus' => $faker->name,
        'email' => $faker->unique()->companyEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'alamat' => $faker->streetAddress,
        'no_telp' => $faker->phoneNumber,
        'status_pengurus' => $faker->unique()->randomElement(['pegawai', 'owner']),
        'remember_token' => str_random(10),

    ];
});

$factory->define(App\order::class, function (Faker $faker) {

    return [
        'user_id' => $faker->numberBetween($min = 1, $max = 10),
        'pengurus_id' => $faker->numberBetween($min = 1, $max = 2),
        'tgl_booking' => $faker->dateTime,
        'tgl_exp' => $faker->dateTime,
        'status_book' => $faker->randomElement(['Lunas', 'DP', 'Baru']),

    ];
});

$factory->define(App\jenis_recorder::class, function (Faker $faker) {

    return [
        'nama_recorder' => $faker->unique()->randomElement(['Recorder Sopran', 'Recorder Sopranino', 'Recorder Alto']),
        'deskripsi' => $faker->sentence(30),
        'harga_recorder' => $faker->unique()->numerify($string = '####00000'),
        'batas_hari' => $faker->numberBetween($min = 1, $max = 3),

    ];
});

$factory->define(App\order_recorder::class, function (Faker $faker) {
    // Random datetime of the current week
    $startingDate = $faker->dateTimeBetween('this week', '+6 days');
    // Random datetime of the current week *after* `$startingDate`
    $endingDate   = $faker->dateTimeBetween($startingDate, strtotime('+6 days'));


    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 10),
        'jenis_recorder_id' => $faker->numberBetween($min = 1, $max = 3),
        'awal' => $startingDate,
        'batas' => $endingDate,

    ];
});

$factory->define(App\kerusakan_studio::class, function (Faker $faker) {


    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 10),
        'keterangan' => $faker->sentence(30),

    ];
});

$factory->define(App\studio::class, function (Faker $faker) {


    return [
        'nama_studio' => $faker->userName,
        'harga_studio' => $faker->numerify($string = '##00000'),
        'ulasan_studio' => $faker->sentence(67),
    ];
});

$factory->define(App\order_studio::class, function (Faker $faker) {


    return [
        'nama_studio' => $faker->userName,
        'harga_studio' => $faker->numerify($string = '##00000'),
        'ulasan_studio' => $faker->sentence(67),
    ];
});

$factory->define(App\jen_alat::class, function (Faker $faker) {


    return [
        'Status' => $faker->unique()->randomElement(['baru','lama']),

    ];
});

$factory->define(App\new_ins::class, function (Faker $faker) {


    return [
        'studio_id' => $faker->numberBetween($min= 1,$max= 10),
        'jenis_alat_id' => $faker->numberBetween($min= 1,$max= 2),
        'nama_inst' => $faker->randomElement(['Gitar','Bass','Drum','Keboard','Mic','Sound System']),
    ];
});

$factory->define(App\JamOrder::class, function (Faker $faker) {

    // set time


    return [

        'pesan' => $faker->randomElement(),
        'sampai' =>  $faker->time('H:i:s'),

    ];
});
