<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use App\Models\Portion;
use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
use App\Models\CustomPortion;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        User::factory(10)->create();

                // Create Products
                $products = Product::factory(50)->create();

        // Create Nutrition records
        $nutritions = Nutrition::factory(50)->create();

        // Create Tags
        $tags = Tag::factory(5)->create();

        // Create Portions
        $portions = Portion::factory(20)->create();



        // Create Custom Portions
        $customPortions = CustomPortion::factory(10)->create();

        // Attach Tags to Products
        $products->each(function ($product) use ($tags) {
            // Randomly attach 1 to 3 tags to each product
            $randomTags = $tags->random(rand(1, 3))->pluck('id');
            $product->tags()->attach($randomTags);
        });
        

    }
}
