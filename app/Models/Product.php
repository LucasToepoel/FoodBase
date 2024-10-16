<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'ean',
        'nutrition_id',
        'portion_product_id',
        'product_tag_id',
    ];

    public function nutrition()
    {
        return $this->belongsTo(Nutrition::class);

    }

    public function portions()
    {
        return $this->belongsToMany(Portion::class);

    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function meal()
    {
        return $this->belongsToMany(Meal::class);
    }
}
