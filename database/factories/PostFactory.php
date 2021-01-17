<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'title' => $faker->word,
        'subtitle' => $faker->word,
        'summary' => $faker->word,
        'body' => $faker->word,
        'price' => $faker->word,
        'booking_link' => $faker->word,
        'booking_link_text' => $faker->word,
        'external_link' => $faker->word,
        'font_text' => $faker->word,
        'font_link' => $faker->word,
        'main_image' => $faker->word,
        'secondary_image' => $faker->word,
        'page' => $faker->word,
        'category_id' => $faker->randomDigitNotNull,
        'published' => $faker->word,
        'created_by' => $faker->randomDigitNotNull,
        'updated_by' => $faker->randomDigitNotNull,
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s')
    ];
});
