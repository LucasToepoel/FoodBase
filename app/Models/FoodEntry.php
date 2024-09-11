<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'calories',
        'fat',
        'carbs',
        'protein',
        'ean',
    ];


}
