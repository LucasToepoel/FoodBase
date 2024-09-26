<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('food.index', [
            'h1' => 'Food Base',
            'products' => Product::all()
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
        $Product = new Product();
        $Product->name = $request->input('name');
        $Product->calories = $request->input('calories');
        $Product->protein = $request->input('protein');
        $Product->carbs = $request->input('carbs');
        $Product->fat = $request->input('fat');
        $Product->ean = $request->input('ean'); // Add the ean field
        $Product->save();

        // Redirect or return a response
        return redirect()->route('FoodBase.index')->with('success', 'Food entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        return view('food.show', [
            'h1' => 'Food Entry'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('food.edit', [
            'h1' => 'Food edit Form'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
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

