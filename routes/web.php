<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
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

Route::get('/auction', [ProductController::class, 'auctionPage'])->name('auctionPage');

Route::get('/buy-now', [ProductController::class, 'buyNowPage'])->name('buyNowPage');

Route::get('/product-{id}', [ProductController::class, 'productById'])->name('productById');

Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');

Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('updateCart');

Route::delete('/delete-cart', [ProductController::class, 'deleteCart'])->name('deleteCart');

Route::middleware('isAdmin')->group(function(){
    Route::prefix('/admin')->group(function(){
        //product
        Route::prefix('/product')->group(function(){
            Route::get('/', [ProductController::class, 'adminProductDashboard'])->name('adminProductDashboard');
            Route::get('/create-product', [ProductController::class, 'createProduct'])->name('createProduct');
            Route::post('/store-product', [ProductController::class, 'storeProduct'])->name('storeProduct');
            Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::patch('/update-product/{id}', [ProductController::class, 'update'])->name('update');
            Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('delete');
            Route::get('/create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
            Route::post('/store-category', [CategoryController::class, 'storeCategory'])->name('storeCategory');
        });

        //auction
        Route::prefix('/auction')->group(function(){
            Route::get('/', [ProductController::class, 'adminAuctionDashboard'])->name('adminAuctionDashboard');
        });

    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
