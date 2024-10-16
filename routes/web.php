<?php

use App\Http\Controllers\NutritionDayPlanController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('NutritionDayPlan', [NutritionDayPlanController::class, 'index'])->name('Day.index');
Route::get('NutritionDayPlan/show', [NutritionDayPlanController::class, 'show'])->name('Day.show');
Route::get('NutritionDayPlan/create', [NutritionDayPlanController::class, 'create'])->name('Day.create');
Route::resource('Product', ProductController::class);

Route::post('/decode-barcode', [ProductController::class, 'decode'])->name('decode.barcode');
Route::post('/uploadbarcode', [ProductController::class, 'upload'])->name('Product.uploadBarcode');

require __DIR__.'/auth.php';
