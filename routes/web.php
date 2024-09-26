<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return redirect()->route('FoodBase.index');
});
Route::resource('Product', ProductController::class);
Route::post('/decode-barcode', [ProductController::class, 'decode'])->name('decode.barcode');
Route::post('/uploadbarcode', [ProductController::class, 'upload'])->name('FoodBase.uploadBarcode');

