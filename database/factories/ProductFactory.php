<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'quantity' => mt_rand(1, 50),
        'price' => mt_rand(5000, 100000),
        'photo' => 'default_photo.jpg',
        'category_id' => mt_rand(1, 10),
        'brand_id' => mt_rand(1, 10)
    ];
});
