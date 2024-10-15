<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\Nutrition;
use Illuminate\Http\Request;
use App\Models\NutritionDayPlan;

class NutritionDayPlanController extends Controller
{

    public function show(Request $request)
    {
        $date = $request->input('date');
        $data = NutritionDayPlan::with(['meals.products.nutrition']) // Add other relationships as needed
        ->where('date', $date)
        ->firstOrCreate(['date' => $date, 'user_id' => auth()->id()]);

        return view('day.show',compact('data'));

    }
    public function index()
    {

        return view('day.index');
    }

}
