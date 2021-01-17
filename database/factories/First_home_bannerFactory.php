<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\First_home_banner;
use Faker\Generator as Faker;

$factory->define(First_home_banner::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'body' => $faker->word,
        'published' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
