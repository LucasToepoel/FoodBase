<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NutritionDayPlan extends Model
{
    use HasFactory;

    protected $appends = ['total_protein', 'total_carbs', 'total_fat', 'total_kcal'];
    protected $fillable = [
        'date',
        'user_id',
    ];

    public function getTotalProteinAttribute()
    {
        $totalProtein = 0;
        foreach ($this->meals as $meal) {
            foreach ($meal->products as $product) {
                $totalProtein += $product->nutrition->protein;
            }
        }
        return $totalProtein;
    }

    public function getTotalCarbsAttribute()
    {
        $totalCarbs = 0;
        foreach ($this->meals as $meal) {
            foreach ($meal->products as $product) {
                $totalCarbs += $product->nutrition->carbs;
            }
        }
        return $totalCarbs;
    }

    public function getTotalFatAttribute()
    {
        $totalFat = 0;
        foreach ($this->meals as $meal) {
            foreach ($meal->products as $product) {
                $totalFat += $product->nutrition->fat;
            }
        }
        return $totalFat;
    }

    public function getTotalKcalAttribute()
    {
        $totalKcal = 0;
        foreach ($this->meals as $meal) {
            foreach ($meal->products as $product) {
                $totalKcal += $product->nutrition->kcal;
            }
        }
        return $totalKcal;
    }
    public function meals()
    {
        return $this->belongsToMany(Meal::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function day()
    {
        return $this->belongsTo(Day::class);
    }
}
