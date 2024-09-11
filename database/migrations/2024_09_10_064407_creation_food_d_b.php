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
        Schema::create('food_entries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('calories');
            $table->string('fat');
            $table->string('carbs');
            $table->string('protein');
            $table->integer('ean');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food_entries');
    }
};
