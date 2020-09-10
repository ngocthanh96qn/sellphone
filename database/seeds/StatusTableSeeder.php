<?php
use App\Status;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
        		[ 'status' => 'Đang đóng gói'],
        		[ 'status' => 'Đang vận chuyển'],
                [ 'status' => 'Đã giao'],
        		[ 'status' => 'Đã hủy']
                
        ];
        Status::insert($data);
    }
}
