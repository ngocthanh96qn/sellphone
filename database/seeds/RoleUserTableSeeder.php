<?php

use Illuminate\Database\Seeder;
use App\RoleUser;
class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        		['user_id'=>1, 'role_id' => '6']    		                     
        ];
        RoleUser::insert($data);
    }
}
