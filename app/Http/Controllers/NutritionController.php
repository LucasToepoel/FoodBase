<?php

namespace App\Http\Controllers;

use App\Models\Nutrition;
use Illuminate\Http\Request;

class NutritionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $nutrition = new Nutrition;
        $nutrition->kcal = $request->input('calories');
        $nutrition->protein = $request->input('protein');
        $nutrition->carbs = $request->input('carbs');
        $nutrition->fat = $request->input('fat');
        $nutrition->created_at = now();
        $nutrition->updated_at = now();
        $nutrition->save();

        return $nutrition;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $nutrition = Nutrition::find($id);
        $nutrition->kcal = $request->input('calories');
        $nutrition->protein = $request->input('protein');
        $nutrition->carbs = $request->input('carbs');
        $nutrition->fat = $request->input('fat');
        $nutrition->updated_at = now();
        $nutrition->save();
    }
}
