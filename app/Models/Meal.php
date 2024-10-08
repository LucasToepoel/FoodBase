<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class)->withPivot('meal_product');
    }


    public function nutritionDayPlans()
    {
        return $this->belongsToMany(NutritionDayPlan::class)->withPivot('meal_time');
    }
}
