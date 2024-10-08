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
        Schema::create('nutritiondayplan_meal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nutritiondayplan_id');
            $table->foreign('nutritiondayplan_id')->references('id')->on('nutritiondayplan')->onDelete('cascade');
            $table->unsignedBigInteger('meal_id');
            $table->foreign('meal_id')->references('id')->on('meals')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutritiondayplan_meal');
    }
};
