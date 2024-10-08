<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionDayPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'user_id',
    ];


    public function meals()
    {
        return $this->belongsToMany(Meal::class)->withPivot('meal_time');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
