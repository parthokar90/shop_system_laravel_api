<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\admin\Role;

class RoleTableSeeder extends Seeder
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
                'role'=>'Admin',
                'created_by'=>0,
                'status'=>1,
            ],
            [
                'role'=>'Customer',
                'created_by'=>0,
                'status'=>1,
            ],
          
        ];

        foreach($data as $roles){
            Role::create($roles);
        }
    }
}
