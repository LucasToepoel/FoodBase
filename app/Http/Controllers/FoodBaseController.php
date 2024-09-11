<?php

namespace App\Http\Controllers;

use App\Models\FoodEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Zxing\QrReader;
use PHPZxing\PHPZxingDecoder;
class FoodBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('food.index', [
            'foodEntries' => FoodEntry::all(),'h1' => 'All Food Entries'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create', [
            'h1' => 'Food Entry Form'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'required|integer',
            'protein' => 'required|integer',
            'carbs' => 'required|integer',
            'fat' => 'required|integer',
            'ean' => 'required|string|max:255', // Add validation for the ean field
        ]);

        // Create a new food entry
        $foodEntry = new FoodEntry();
        $foodEntry->name = $request->input('name');
        $foodEntry->calories = $request->input('calories');
        $foodEntry->protein = $request->input('protein');
        $foodEntry->carbs = $request->input('carbs');
        $foodEntry->fat = $request->input('fat');
        $foodEntry->ean = $request->input('ean'); // Add the ean field
        $foodEntry->save();

        // Redirect or return a response
        return redirect()->route('FoodBase.index')->with('success', 'Food entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(FoodEntry $foodEntry)
    {
        return view('food.show', [
            'h1' => 'Food Entry'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FoodEntry $foodEntry)
    {
        return view('food.edit', [
            'h1' => 'Food edit Form'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FoodEntry $foodEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FoodEntry $foodEntry)
    {
        //
    }


public function upload(Request $request)
{
    $request->validate([
        'barcode' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $path = $request->file('barcode')->store('public/barcodes');


    $result = shell_exec(base_path('\ZBar\bin\zbarimg.exe') . ' -q --raw ' . storage_path('app/' . $path));

    $data = explode("\n", $result)[0];

    Storage::delete($path);
  return redirect()->back()->with('ean', $data);


}

}

