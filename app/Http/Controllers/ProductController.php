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
        $products = Product::paginate(10);

        return view('food.index', compact('products'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'required|integer',
            'protein' => 'required|integer',
            'carbs' => 'required|integer',
            'fat' => 'required|integer',
            'ean' => 'required|string|max:255',
        ]);

        // Create a new Nutrition entry
        $nutrition = app('App\Http\Controllers\NutritionController')->store($request);

        // Create a new Product entry
        $product = new Product();
        $product->name = $request->input('name');
        $product->nutrition_id = $nutrition->id;
        $product->ean = $request->input('ean');
        $product->save();

        return redirect()->route('Product.index')->with('success', 'Food entry created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        $product = Product::find($Product->id);
        return view('food.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        $product = Product::find($Product->id);
        return view('food.edit', compact('Product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'calories' => 'required|integer',
            'protein' => 'required|integer',
            'carbs' => 'required|integer',
            'fat' => 'required|integer',
            'ean' => 'required|string|max:255',
        ]);

        // Update the Product entry
        $Product->name = $request->input('name');
        $Product->ean = $request->input('ean');
        $Product->save();

        // Update the associated Nutrition entry
        app('App\Http\Controllers\NutritionController')->update($request, $Product->nutrition_id);

        return redirect()->route('Product.index')->with('success', 'Food entry updated successfully.');
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
