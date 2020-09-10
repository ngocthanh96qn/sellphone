<?php

use Illuminate\Database\Seeder;
use App\Deliverer;
class DelivererTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        		['name' => 'Nguyen Van A','phone' => '0172733638'],
        		['name' => 'Nguyen Van Binh','phone' => '0128993638'],
        		['name' => 'Nguyen Van tuan','phone' => '0776368973']
        ];
        Deliverer::insert($data);
    }
}
