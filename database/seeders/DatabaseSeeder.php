<?php

namespace Database\Seeders;

use App\Models\Nutrition;
use App\Models\Portion;
use App\Models\User;
use App\Models\Product;
use App\Models\Tag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(10)->create();
         Nutrition::factory(50)->create();

         Tag::factory(5)->create();
         Portion::factory(100)->create();
         Product::factory(50)->create();


    }
}
