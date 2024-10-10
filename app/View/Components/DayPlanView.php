<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DayPlanView extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct($meals) // Inject products through constructor
    {
        $this->meals = $meals;
    }
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.day-plan-view');
    }
}
