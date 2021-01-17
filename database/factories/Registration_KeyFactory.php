<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Registration_Key;
use Faker\Generator as Faker;

$factory->define(Registration_Key::class, function (Faker $faker) {

    return [
        'key' => $faker->word,
        'status' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
