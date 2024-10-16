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

        // Ensure the user is authenticated and has an ID
        $userId = auth()->id();
        if (!$userId) {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->withErrors('You must be logged in to view this page.');
        }

        // Use firstOrCreate to find or create the nutrition day plan
        $data = NutritionDayPlan::with(['meals.products.nutrition']) // Add other relationships as needed
            ->where('date', $date)
            ->where('user_id', $userId)
            ->firstOrCreate([
                'date' => $date,
                'user_id' => $userId
            ]);

        return view('day.show', compact('data'));
    }

    public function index()
    {

        return view('day.index');
    }

    public function create()
    {
        return view('day.create');
    }

}
