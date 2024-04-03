<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TableController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/table/{table}',[OrderController::class,'scan'])->name('order.scan');
Route::post('/table/{table}/cart',[OrderController::class,'cart'])->name('order.cart');
// Route::post('/table/{table}/order/{food}',[OrderController::class,'store'])->name('order.store');






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/table',[TableController::class,'index'])->name('table.index');
    Route::post('/table',[TableController::class,'store'])->name('table.store');
    Route::get('/table/{table}/edit',[TableController::class,'edit'])->name('table.edit');
    Route::put('/table/{table}/update',[TableController::class,'update'])->name('table.update');
    Route::delete('/table/{table}/destroy',[TableController::class,'destory'])->name('table.destroy');
    Route::get('/table/create',[TableController::class,'create'])->name('table.create');

    Route::get('/food/category',[CategoryController::class,'index'])->name('category.index');
    Route::post('/food/category',[CategoryController::class,'store'])->name('category.store');
    Route::get('/food/category/{category}/edit',[CategoryController::class,'edit'])->name('category.edit');
    Route::put('/food/category/{category}/update',[CategoryController::class,'update'])->name('category.update');
    Route::delete('/food/category/{category}/destroy',[CategoryController::class,'destory'])->name('category.destroy');
    Route::get('/food/category/create',[CategoryController::class,'create'])->name('category.create');

    Route::get('/food',[FoodController::class,'index'])->name('food.index');
    Route::post('/food',[FoodController::class,'store'])->name('food.store');
    Route::get('/food/{food}/edit',[FoodController::class,'edit'])->name('food.edit');
    Route::put('/food/{food}/update',[FoodController::class,'update'])->name('food.update');
    Route::delete('/food/{food}/destroy',[FoodController::class,'destory'])->name('food.destroy');
    Route::get('/food/create',[FoodController::class,'create'])->name('food.create');
    
    Route::get('/order',[OrderController::class,'index'])->name('order.index');
});

require __DIR__.'/auth.php';
