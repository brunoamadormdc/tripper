<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Package;
use Faker\Generator as Faker;

$factory->define(Package::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'subtitle' => $faker->word,
        'body' => $faker->word,
        'main_image' => $faker->word,
        'price' => $faker->randomDigitNotNull,
        'published' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
