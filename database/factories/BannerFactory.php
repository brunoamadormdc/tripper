<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Banner;
use Faker\Generator as Faker;

$factory->define(Banner::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'image' => $faker->word,
        'link' => $faker->word,
        'body' => $faker->word,
        'promotion' => $faker->word,
        'location' => $faker->word,
        'published' => $faker->word,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
