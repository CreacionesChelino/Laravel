<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => 'Herramientas',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'id' => 2,
            'name' => 'Materiales',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'id' => 3,
            'name' => 'Equipos',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
