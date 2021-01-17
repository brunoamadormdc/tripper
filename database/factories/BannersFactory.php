<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banners;
use Faker\Generator as Faker;

$factory->define(Banners::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'image' => $faker->word,
        'link' => $faker->word,
        'body' => $faker->word,
        'promotion' => $faker->word,
        'published' => $faker->word,
        'location' => $faker->randomElement(]),
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
