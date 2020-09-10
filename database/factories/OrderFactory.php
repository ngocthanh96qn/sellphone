<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use App\User;
use App\Status;
use App\Deliverer;
use App\Guest;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
	$listUserID= User::pluck('id');
    $listGuestID= Guest::pluck('id');
	$listStatusID= Status::pluck('id');
	$listDelivererID= Deliverer::pluck('id');
  
    return [
        'user_id' => $faker->randomElement($listUserID),
        'guest_id' => $faker->randomElement($listGuestID),
        'name' =>  $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'phone' => $faker->e164PhoneNumber,
        'status_id' => $faker->randomElement($listStatusID),
        'deliverer_id' =>$faker->randomElement($listDelivererID),
        'total_price' => rand(10, 1000000), // password
        'note' => $faker->text
       
    ];
});
