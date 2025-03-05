<?php

namespace Database\Seeders;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlowersDiskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $flowers = [
            [
                'name' => 'Rose',
                'small_img' => '/storage/flowers_disk/red-rose-flower-illustration-Rose-Rose-HD-leaf-color-plant-Stem-png-min_2.webp',
                'large_img' => '/storage/flowers_disk/red-rose-flower-illustration-Rose-Rose-HD-leaf-color-plant-Stem-png-min_2.webp',
                'description' => 'Roses are iconic flowers known for their beauty and fragrance, symbolizing love.',
            ],
            [
                'name' => 'Tulip',
                'small_img' => '/storage/flowers_disk/Tulip_Transparent_Image-1525420458_2.webp',
                'large_img' => '/storage/flowers_disk/Tulip_Transparent_Image-1525420458_2.webp',
                'description' => 'Tulips are colorful flowers, popular in gardens and symbolizing perfect love.',
            ],
            [
                'name' => 'Sunflower',
                'small_img' => '/storage/flowers_disk/purepng.com-sunflowersunflowersunflower-plantsunflower-oilyellow-sunflower-1701527749038lczyn_2.webp',
                'large_img' => '/storage/flowers_disk/purepng.com-sunflowersunflowersunflower-plantsunflower-oilyellow-sunflower-1701527749038lczyn_2.webp',
                'description' => 'Sunflowers are known for their large yellow petals and seeds, often associated with happiness.',
            ],
            [
                'name' => 'Orchid',
                'small_img' => '/storage/flowers_disk/pngtree-red-orchid-on-white-background-vibrant-png-image_10174647_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-red-orchid-on-white-background-vibrant-png-image_10174647_2.webp',
                'description' => 'Orchids are exotic flowers with intricate designs, symbolizing beauty and strength.',
            ],
            [
                'name' => 'Daffodil',
                'small_img' => '/storage/flowers_disk/Yellow_Daffodils_PNG_Transparent_Clip_Art_Image_2.webp',
                'large_img' => '/storage/flowers_disk/Yellow_Daffodils_PNG_Transparent_Clip_Art_Image_2.webp',
                'description' => 'Daffodils are bright yellow spring flowers, representing renewal and new beginnings.',
            ],
            [
                'name' => 'Lily',
                'small_img' => '/storage/flowers_disk/pngtree-white-lily-flower-png-image_10012327_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-white-lily-flower-png-image_10012327_2.webp',
                'description' => 'Lilies are elegant flowers, often symbolizing purity, beauty, and renewal.',
            ],
            [
                'name' => 'Lavender',
                'small_img' => '/storage/flowers_disk/lavender-png-mnh3txq1oo3ve9qw.webp',
                'large_img' => '/storage/flowers_disk/lavender-png-mnh3txq1oo3ve9qw.webp',
                'description' => 'Lavender is a fragrant flower, symbolizing calm and often used in aromatherapy.',
            ],
            [
                'name' => 'Chrysanthemum',
                'small_img' => '/storage/flowers_disk/Orange_Chrysanthemum_Flower_Transparent_Clip_Art_Image_2.webp',
                'large_img' => '/storage/flowers_disk/Orange_Chrysanthemum_Flower_Transparent_Clip_Art_Image_2.webp',
                'description' => 'Chrysanthemums are vibrant flowers often seen in autumn, symbolizing longevity.',
            ],
            [
                'name' => 'Jasmine',
                'small_img' => '/storage/flowers_disk/pngtree-jasmine-flower-ai-generated-png-image_12382601_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-jasmine-flower-ai-generated-png-image_12382601_2.webp',
                'description' => 'Jasmine is a fragrant white flower, symbolizing love, beauty, and sensuality.',
            ],
            [
                'name' => 'Gerbera',
                'small_img' => '/storage/flowers_disk/yellow_gerbera_daisy_by_jeanicebartzen27_daj9k1g-fullview_2.webp',
                'large_img' => '/storage/flowers_disk/yellow_gerbera_daisy_by_jeanicebartzen27_daj9k1g-fullview_2.webp',
                'description' => 'Gerbera daisies are vibrant flowers representing cheerfulness and innocence.',
            ],
            [
                'name' => 'Poppy',
                'small_img' => '/storage/flowers_disk/Red_Poppy_Flower_PNG_Clip_Art_Image-1096497855_2.webp',
                'large_img' => '/storage/flowers_disk/Red_Poppy_Flower_PNG_Clip_Art_Image-1096497855_2.webp',
                'description' => 'Poppies are red flowers symbolizing remembrance and peace.',
            ],
            [
                'name' => 'Peony',
                'small_img' => '/storage/flowers_disk/pngtree-pink-peony-flower-png-image_11561406_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-pink-peony-flower-png-image_11561406_2.webp',
                'description' => 'Peonies are lush flowers that symbolize prosperity, good luck, and romance.',
            ],
            [
                'name' => 'Iris',
                'small_img' => '/storage/flowers_disk/iris-flower-on-transparent-background-free-png_2.webp',
                'large_img' => '/storage/flowers_disk/iris-flower-on-transparent-background-free-png_2.webp',
                'description' => 'Iris flowers are known for their unique shape and symbolizing wisdom and faith.',
            ],
            [
                'name' => 'Dahlia',
                'small_img' => '/storage/flowers_disk/dahlia-flower-free-png_2.webp',
                'large_img' => '/storage/flowers_disk/dahlia-flower-free-png_2.webp',
                'description' => 'Dahlias are bold flowers, representing strength, beauty, and creativity.',
            ],
            [
                'name' => 'Hibiscus',
                'small_img' => '/storage/flowers_disk/pngtree-beautiful-red-hibiscus-flower-png-image_6845814_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-beautiful-red-hibiscus-flower-png-image_6845814_2.webp',
                'description' => 'Hibiscus flowers are tropical blooms, symbolizing beauty, charm, and feminine strength.',
            ],
            [
                'name' => 'Zinnia',
                'small_img' => '/storage/flowers_disk/botanical-zinnia-flower-and-leaf-isolated-on-transparent-background-free-png_2.webp',
                'large_img' => '/storage/flowers_disk/botanical-zinnia-flower-and-leaf-isolated-on-transparent-background-free-png_2.webp',
                'description' => 'Zinnias are hardy flowers known for their bright colors and symbolism of endurance.',
            ],
            [
                'name' => 'Carnation',
                'small_img' => '/storage/flowers_disk/pngtree-carnation-pink-illustration-png-image_6694653_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-carnation-pink-illustration-png-image_6694653_2.webp',
                'description' => 'Carnations are popular flowers that symbolize love, fascination, and distinction.',
            ],
            [
                'name' => 'Begonia',
                'small_img' => '/storage/flowers_disk/pngtree-begonia-everblooming-red-flower-png-image_13520306_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-begonia-everblooming-red-flower-png-image_13520306_2.webp',
                'description' => 'Begonias are known for their colorful flowers and are often associated with caution and discretion.',
            ],
            [
                'name' => 'Calla Lily',
                'small_img' => '/storage/flowers_disk/pngtree-watercolor-floral-bouquet-illustration-calla-lily-flowers-ai-generated-png-image_11579870_2.webp',
                'large_img' => '/storage/flowers_disk/pngtree-watercolor-floral-bouquet-illustration-calla-lily-flowers-ai-generated-png-image_11579870_2.webp',
                'description' => 'Calla lilies are elegant flowers symbolizing purity and magnificence.',
            ],
            [
                'name' => 'Camellia',
                'small_img' => '/storage/flowers_disk/camellia-5562259_1280_2.webp',
                'large_img' => '/storage/flowers_disk/camellia-5562259_1280_2.webp',
                'description' => 'Camellias are stunning flowers symbolizing love, affection, and admiration.',
            ],
        ];

        $currentTime = Carbon::now();
        
        foreach ($flowers as $flower) {
            DB::table('flowers_disk_table')->insert([
                'name' => $flower['name'],
                'small_img' => $flower['small_img'],
                'large_img' => $flower['large_img'],
                'description' => $flower['description'],
                'created_at' => $currentTime,
                'updated_at' => $currentTime,
            ]);
        }
    }
}
