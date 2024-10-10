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
        'nutrition_day_plans_id',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function nutritionDayPlan()
    {
        return $this->belongsTo(NutritionDayPlan::class);
    }

}
