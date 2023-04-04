<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Martillo',
            'description' => 'Martillo de 1kg',
            'quantity' => 10,
            'stock' => 10,
            'active' => 1,
            'price' => 100,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Taladro',
            'description' => 'Taladro de 1kg',
            'quantity' => 10,
            'stock' => 10,
            'active' => 1,
            'price' => 100,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Sierra',
            'description' => 'Sierra de 1kg',
            'quantity' => 10,
            'stock' => 10,
            'active' => 1,
            'price' => 100,
            'category_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
