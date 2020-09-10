<?php
use App\Order_detail;
use Illuminate\Database\Seeder;

class Order_detailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        factory(App\Order_detail::class,10)->create();
    }
}
