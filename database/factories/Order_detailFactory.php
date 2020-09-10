<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_detail;
use App\Order;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Order_detail::class, function (Faker $faker) {
	$listOrderID = Order::pluck('id');
	$listProductID = Product::pluck('id');
    return [
        'order_id' => $faker->randomElement($listOrderID),
        'product_id' => $faker->randomElement($listProductID),
        'sale_quantity'=> rand(1,5),
        'price'=> rand(100,1000000)

    ];
});
