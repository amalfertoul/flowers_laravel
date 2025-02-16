<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('reviews')->insert([
            [
                'user_id' => 2, 
                'phrase' => 'The roses were absolutely stunning! Their deep red color and freshness made them the perfect gift. I could feel the care that went into arranging them.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, 
                'phrase' => 'I ordered a bouquet of tulips for my friend’s birthday, and they were beyond beautiful. Each flower was vibrant, and the arrangement was done with such elegance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4, 
                'phrase' => 'The lavender bouquet I received was truly enchanting. The calming fragrance filled the entire room, and the quality of the flowers was top-notch. Highly recommended!',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
