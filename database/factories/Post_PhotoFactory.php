<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post_Photo;
use Faker\Generator as Faker;

$factory->define(Post_Photo::class, function (Faker $faker) {

    return [
        'image' => $faker->word,
        'post_id' => $faker->randomDigitNotNull,
        'published' => $faker->word,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
