<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Foodshowinfo extends Component
{
    /**
     * Create a new component instance.
     */
    public $product;

    public function __construct($product) // Inject products through constructor
    {
        $this->product = $product;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.foodshowinfo');
    }
}
