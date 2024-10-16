<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomPortion extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit',
        'value',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
