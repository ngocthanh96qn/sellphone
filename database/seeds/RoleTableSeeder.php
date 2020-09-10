<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data = [
        		['name' => 'Quản lí phân quyền'],
        		['name' => 'Quản lí hãng sản phẩm'],
        		['name' => 'Quản lí sản phẩm'],
                ['name' => 'Quản lí đơn hàng'],
                ['name' => 'Quản lí khách hàng'],
                ['name' => 'Quản lí người phân quyền'],
        ];
        Role::insert($data);
    }
}
