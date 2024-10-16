<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'user_id',
    ];

    public function nutritionDayPlans()
    {
        return $this->hasOne(NutritionDayPlan::class);
    }
}
