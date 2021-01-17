<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post_Detail;
use Faker\Generator as Faker;

$factory->define(Post_Detail::class, function (Faker $faker) {

    return [
        'body' => $faker->word,
        'post_id' => $faker->randomDigitNotNull,
        'published' => $faker->word,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
