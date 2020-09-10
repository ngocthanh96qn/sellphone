<?php
use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	 $data = [
        		['name' => 'Iphone',],
        		['name' => 'Samsung'],
        		['name' => 'OPPO'],
        		['name' => 'Vsmart'],
        		['name' => 'Xiaomi'],
        		['name' => 'Realme'],
        		['name' => 'Nokia'],
        		['name' => 'Vivo'],
        		['name' => 'Huawei'],
        		['name' => 'Masstel'],

        ];
        Category::insert($data);
        //factory(App\Category::class,6)->create();
    }
}
