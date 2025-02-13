<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('cart_items')->insert([
            [
                'user_id' => 1, // Reference to user 'kuro'
                'product_id' => 1, // Reference to product 'Rose'
                'quantity' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2, // Reference to user 'kibo'
                'product_id' => 4, // Reference to product 'Orchid'
                'quantity' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, // Reference to user 'shiro'
                'product_id' => 7, // Reference to product 'Lavender'
                'quantity' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
