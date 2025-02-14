<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'user_id' => 1,
                'total_price' => 30.00,
                'status' => 'completed',
                'trackingNumber' => 'J8ETO47WSAP8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'total_price' => 12.00,
                'status' => 'pending',
                'trackingNumber' => 'R3PLN62YTQK1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'total_price' => 54.00,
                'status' => 'canceled',
                'trackingNumber' => 'X9MGK85VWCZ4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
