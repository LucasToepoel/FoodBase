<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nutrition extends Model
{
    use HasFactory;
    protected $fillable = [
        'kcal',
        'fat',
        'carbs',
        'protein',
    ];

public function product()
{
    return $this->hasOne(Product::class);
}
}
