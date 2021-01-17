<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Destiny;
use Faker\Generator as Faker;

$factory->define(Destiny::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'body' => $faker->word,
        'main_image' => $faker->word,
        'secondary_image' => $faker->word,
        'published' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
