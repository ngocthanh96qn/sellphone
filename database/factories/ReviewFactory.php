<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Review;
use App\Guest;
use App\Product;
use App\User;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
	$listUserID= User::pluck('id');
    $listGuestID= Guest::pluck('id');
	$listProductID= Product::pluck('id');
    return [
        'user_id' => $faker->randomElement($listUserID),
        'guest_id' => $faker->randomElement($listGuestID),
        'product_id' => $faker->randomElement($listProductID),
        'value' => rand(1, 5), 
        'content' => $faker->text
    ];
});
