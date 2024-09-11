<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodBaseController;
Route::get('/', function () {
    return view('welcome');
});
Route::resource('FoodBase', FoodBaseController::class);
Route::post('/decode-barcode', [FoodBaseController::class, 'decode'])->name('decode.barcode');
Route::post('/uploadbarcode', [FoodBaseController::class, 'upload'])->name('FoodBase.uploadBarcode');
//
// Route::get('FoodBase', [FoodBaseController::class, 'index'])->name('FoodBase.index');
// Route::get('FoodBase/create', [FoodBaseController::class, 'create'])->name('FoodBase.create');
// Route::post('FoodBase', [FoodBaseController::class, 'store'])->name('FoodBase.store');
// Route::get('FoodBase/{FoodBase}', [FoodBaseController::class, 'show'])->name('FoodBase.show');
// Route::get('FoodBase/{FoodBase}/edit', [FoodBaseController::class, 'edit'])->name('FoodBase.edit');
// Route::put('FoodBase/{FoodBase}', [FoodBaseController::class, 'update'])->name('FoodBase.update');
// Route::delete('FoodBase/{FoodBase}', [FoodBaseController::class, 'destroy'])->name('FoodBase.destroy');
