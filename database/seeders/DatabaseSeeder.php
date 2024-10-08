<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Portion;
use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        $tags = Tag::factory(5)->create();
        $products = Product::factory(50)->food()->create();
        Portion::factory(20)->create();
        Portion::factory(20)->custom()->create();
         // Attach Tags to Products
        $products->each(function ($product) use ($tags) {
            $randomTags = $tags->random(rand(1, 3))->pluck('id');
            $product->tags()->attach($randomTags);
        });
        Meal::factory(20)->create();

        Meal::all()->each(function ($meal) use ($products) {
            $randomProducts = $products->random(rand(1, 5))->pluck('id');
            $meal->products()->attach($randomProducts);
        });

    }
}
