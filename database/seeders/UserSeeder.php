<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'id' => 1,
            'name' => 'Admin',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Vendor',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('roles')->insert([
            'id' => 3,
            'name' => 'Client',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Admin',
            'app' => 'Creaciones',
            'apm' => 'Chelino',
            'email' => 'admin@chelino.com',
            'password' => Hash::make('Chelino123#$'),
            'active' => 1,
            'phone' => '0000000000',
            'role_id' => 1,
            'address' => 'Calle 1 # 2 Col. 3',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Clara',
            'app' => 'Alcantara',
            'apm' => 'Esquivel',
            'email' => 'clara@gmail.com',
            'password' => Hash::make('Clara13.1'),
            'active' => 1,
            'phone' => '5649481201',
            'role_id' => 3,
            'address' => 'Calle 3 #22 Col 2, Xonacatlan, Estado de Mexico',
            'created_at' => now(),
            'updated_at' => now()
        ]);

    }
}
