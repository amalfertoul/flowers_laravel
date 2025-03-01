<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Rose',
                'image' => 'storage/products/b6c5efaf580823ffa186dc75e4df5cf1.jpg',
                'price' => 15.00,
                'stock' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tulip',
                'image' => 'storage/products/493022d455070861e46d7298036190a4.jpg',
                'price' => 10.00,
                'stock' => 20,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sunflower',
                'image' => 'storage/products/5688adc05ce02d64738b5ba82a7fc6e3.jpg',
                'price' => 8.00,
                'stock' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Orchid',
                'image' => 'storage/products/f6e45463922b386c9efaac9934152445.jpg',
                'price' => 12.00,
                'stock' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lily',
                'image' => 'storage/products/2cfa589c66970b1468e5d0fa6f80ae94.jpg',
                'price' => 25.00,
                'stock' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Daisy',
                'image' => 'storage/products/754bca2bb64fbcc240d4c1ddb0319d33.jpg',
                'price' => 5.00,
                'stock' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lavender',
                'image' => 'storage/products/c5ca2b1eaf15a41f4486c9e8527eca0a.jpg',
                'price' => 20.00,
                'stock' => 69,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Violet',
                'image' => 'storage/products/3fc7215a989943d3c5ec2bc7b205ccb1.jpg',
                'price' => 20.00,
                'stock' => 26,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jasmine',
                'image' => 'storage/products/51447fcb86eff8e63a7742b77ec9d5a8.jpg',
                'price' => 18.00,
                'stock' => 22,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
