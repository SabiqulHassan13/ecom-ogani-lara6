<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Model::class, function (Faker $faker) {
    return [
        'category_id'           => $faker->numberBetween(13, 17),
        'brand_id'              => $faker->numberBetween(1, 6),
        'name'                  => $prodcutName = $faker->name,
        'slug'                  => Str::slug($prodcutName),
        'short_description'     => $faker->short_description,
        'long_description'      => $faker->long_description,
        'price'                 => $faker->price,
        'quantity'              => $faker->quantity,
        'publication_status'    => $faker->publication_status,

        
    ];
});
