<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FoodIndexTable extends Component
{
    public $products;

    public function __construct($products) // Inject products through constructor
    {
        $this->products = $products;
    }

    public function render(): View|Closure|string
    {
        return view('components.food-index-table');
    }
}
