<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'title'=> $faker->words(2, true),
        'description'=> $faker->paragraph(),
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 29.99, $max = 999.99),
        'size' => $faker->randomElement($array = ['36', '38', '40', '42', '44', '46', '48', '50']),
        'code' => $faker->randomElement($array = ['soldes', 'nouveautés']),
        'reference' => $faker->isbn10()
    ];
});