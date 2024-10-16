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
        Schema::create('nutrition', function (Blueprint $table) {
            $table->id();
            $table->float('kcal');
            $table->float('protein');
            $table->float('fat');
            $table->float('carbs');
            $table->timestamps();
        });

        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('nutrition_id')->nullable()->after('ean')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nutrition');

        Schema::table('products', function (Blueprint $table) {
            $table->integer('holding_id')->unsigned()->change();
            $table->dropForeign(['nutrition_id']);
        });
    }
};
