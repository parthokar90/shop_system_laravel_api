<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\admin\SystemStatus;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            [
            'status_name'=>'Pending',
            'user_found'=>0,
            'created_by'=>0,
            'status'=>1,
            ],

            [
                'status_name'=>'Accepted',
                'user_found'=>0,
                'created_by'=>0,
                'status'=>1,
            ],
            [
                'status_name'=>'Delivered',
                'user_found'=>0,
                'created_by'=>0,
                'status'=>1,
            ],
            [
                'status_name'=>'Return',
                'user_found'=>1,
                'created_by'=>0,
                'status'=>1,
            ],

            [
                'status_name'=>'Active',
                'user_found'=>0,
                'created_by'=>0,
                'status'=>1,
            ],

            [
                'status_name'=>'Inactive',
                'user_found'=>0,
                'created_by'=>0,
                'status'=>1,
            ],
         ];

         foreach($data as $status){
            SystemStatus::create($status);
         }
    }
}
