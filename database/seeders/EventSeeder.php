<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('events')->insert([
            [
                'user_id' => 2, 
                'eventDate' => '2025-03-15',
                'phoneNumber' => '+212612345678', 
                'eventTitle' => 'Wedding Ceremony',
                'request' => 'A beautiful arrangement of roses, lilies, and tulips to decorate the wedding venue. Include pastel tones for a romantic ambiance.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3, 
                'eventDate' => '2025-04-10',
                'phoneNumber' => '+212622345678', 
                'eventTitle' => 'Birthday Celebration',
                'request' => 'Vibrant bouquets of sunflowers and daisies for table centerpieces. Add some colorful ribbons to make it festive.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4, 
                'eventDate' => '2025-05-25',
                'phoneNumber' => '+212632345678', 
                'eventTitle' => 'Corporate Gala',
                'request' => 'Elegant orchid arrangements with a touch of lavender to enhance the corporate setting. Use classy vases for a modern look.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
