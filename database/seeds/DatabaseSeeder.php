<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    
        $this->call(UserTableSeeder::class);
        $this->call(GuestTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(DelivererTableSeeder::class);
        $this->call(StatusTableSeeder::class);
       // $this->call(OrderTableSeeder::class);       
        $this->call(CategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
       // $this->call(Order_detailsTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(RoleUserTableSeeder::class);
        $this->call(ImagesTableSeeder::class);


    }
}
