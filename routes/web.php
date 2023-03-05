<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ProductController::class, 'welcome'])->name('welcome');

Route::middleware('isAdmin')->group(function(){
    Route::get('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
    Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('storeProduct');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');
    Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete');
    Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
    Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('storeCategory');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
