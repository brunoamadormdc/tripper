<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destiny_photo;
use Faker\Generator as Faker;

$factory->define(Destiny_photo::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'destiny_id' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
