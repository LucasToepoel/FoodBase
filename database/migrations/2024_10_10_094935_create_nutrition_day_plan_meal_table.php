<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_nutrition_day_plan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nutrition_day_plan_id');
            $table->foreign('nutrition_day_plan_id')->references('id')->on('nutrition_day_plans')->onDelete('cascade');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_nutrition_day_plan');
    }
};
