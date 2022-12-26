<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserTableSeeder extends Seeder
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
                'role'=>1,
                'name'=>'Admin',
                'email'=>'admin@email.com',
                'password' => Hash::make(12345678),
            ],
            [
                'role'=>2,
                'name'=>'Customer',
                'email'=>'customer@email.com',
                'password' => Hash::make(12345678),
            ],
          
        ];

        foreach($data as $user){
            User::create($user);
        }
    }
}
