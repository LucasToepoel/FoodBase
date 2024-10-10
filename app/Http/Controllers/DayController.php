<?php

namespace App\Http\Controllers;

use App\Models\Day;
use Illuminate\Http\Request;

class DayController extends Controller
{

    public function show(Request $request)
    {
        $date = $request->query('date');

        // Process the date as needed
        // For example, you might want to return a view with the date
        return view('day.show', compact('date'));
    }
    public function index()
    {

        return view('day.index');
    }

}
