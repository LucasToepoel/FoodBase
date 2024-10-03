<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Nutrition;
use Illuminate\Contracts\Cache\Store;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all(); // Replace with your data fetching logic

        return view('food.index', compact('products')); // Pass data to the view
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('food.create');
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

// Create a new Nutrition object and assign it to the Product's nutrition property
$nutrition = new Nutrition();
$nutrition->kcal = $request->input('calories');
$nutrition->protein = $request->input('protein');
$nutrition->carbs = $request->input('carbs');
$nutrition->fat = $request->input('fat');
$nutrition->created_at = now();
$nutrition->updated_at = now();

// Save the Nutrition object first
$nutrition->save();

// Assign the nutrition object's id to the Product's nutrition_id property
$Product->nutrition_id = $nutrition->id;
$Product->ean = $request->input('ean');

// Save the Product
$Product->save();
        return redirect()->route('Product.index')->with('success', 'Food entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        $product = Product::find($Product->id);

        return view('food.show', compact('product')); // Pass data to the view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        // No need to find the product again
         $Product = Product::find($Product->id);

        return view('food.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
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
            $Product = Product::find($Product->id);
            $nutrition = Nutrition::find($Product->nutrition_id);
            $Product->name = $request->input('name');
            $nutrition->kcal = $request->input('calories');
            $nutrition->protein = $request->input('protein');
            $nutrition->carbs = $request->input('carbs');
            $nutrition->fat = $request->input('fat');
            $nutrition->updated_at = now();
            $Product->save();
            $nutrition->save();
            // Redirect or return a response

            return redirect()->route('Product.index')->with('success', 'Food entry created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        $Product->delete();
        return redirect()->route('Product.index')->with('success', 'Food entry deleted successfully.');

    }


public function upload(Request $request)
{
    $request->validate([
        'barcode' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
    ]);

    $path = $request->file('barcode')->store();

    $result = shell_exec(base_path('\ZBar\bin\zbarimg.exe') . ' -q --raw ' . storage_path('app\\private\\' . $path));

    $data = explode("\n", $result)[0];
    Storage::delete($path);
  return redirect()->back()->with('ean', $data);


}

}

