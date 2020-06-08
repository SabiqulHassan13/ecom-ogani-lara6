<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Brand;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Brand::class, function (Faker $faker) {
    return [
        'name'                  =>  $brandName = $faker->sentence($nbWords = 2, $variableNbWords = true),
        'slug'                  =>  Str::slug($brandName),
        'description'           =>  $faker->text,
        'image'                 =>  'frontend/img/categories/cat-1.jpg',
        'publication_status'    =>  $faker->boolean,
    ];
});
