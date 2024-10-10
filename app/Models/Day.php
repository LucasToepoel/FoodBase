<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
