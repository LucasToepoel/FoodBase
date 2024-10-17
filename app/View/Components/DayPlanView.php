<?php

namespace App\View\Components;

use App\Models\NutritionDayPlan;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DayPlanView extends Component
{
    public NutritionDayPlan $data;

    public function __construct(NutritionDayPlan $data) // Inject products through constructor
    {

        $this->data = $data;

    }

    public function render(): View|Closure|string
    {
        return view('components.day-plan-view', ['data' => $this->data]);
    }
}
