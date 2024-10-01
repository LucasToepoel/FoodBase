<?php

namespace Database\Seeders;


use App\Models\Portion;
use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
use App\Models\CustomPortion;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Log::info('Seeding Users');
        User::factory(10)->create();
        Log::info('Seeding Tags');
        $tags = Tag::factory(5)->create();
        Log::info('Seeding Products');
        $products = Product::factory(50)->food()->create();
        Log::info('Seeding portions');
        Portion::factory(20)->create();
        Portion::factory(20)->custom()->create();


        // Attach Tags to Products
        $products->each(function ($product) use ($tags) {
            $randomTags = $tags->random(rand(1, 3))->pluck('id');
            $product->tags()->attach($randomTags);
        });

    }
}
