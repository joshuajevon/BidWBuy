<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CategoryController;
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

Route::get('/auction-{id}', [BidController::class, 'auctionById'])->name('auctionById');


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
            Route::get('/list-dashboard', [ShopController::class, 'listDashboard'])->name('listDashboard');

            Route::get('/{status}', [ShopController::class, 'filterPayments']);
            Route::post('/verify/{id}', [ShopController::class, 'verifyPayment'])->name('verifyPayment');
            Route::post('/reject/{id}', [ShopController::class, 'rejectPayment'])->name('rejectPayment');
        });

        //auction
        Route::prefix('/auction')->group(function(){
            Route::get('/', [ProductController::class, 'adminAuctionDashboard'])->name('adminAuctionDashboard');

            Route::get('/create-auction', [ProductController::class, 'createAuction'])->name('createAuction');
            Route::post('/store-auction', [ProductController::class, 'storeAuction'])->name('storeAuction');
            Route::get('/edit-auction/{id}', [ProductController::class, 'editAuction'])->name('editAuction');
            Route::patch('/update-auction/{id}', [ProductController::class, 'updateAuction'])->name('updateAuction');
            Route::delete('/delete-auction/{id}', [ProductController::class, 'deleteAuction'])->name('deleteAuction');
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
        Route::get('/user-dashboard', [ShopController::class, 'userDashboard'])->name('userDashboard');
        Route::get('/cart', [ProductController::class, 'cart'])->name('cart');

        Route::get('/add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('addToCart');

        Route::patch('/update-cart', [ProductController::class, 'updateCart'])->name('updateCart');

        Route::delete('/delete-cart', [ProductController::class, 'deleteCart'])->name('deleteCart');

        Route::get('/payment', [ShopController::class, 'payment'])->name('payment');

        Route::post('/store-shop', [ShopController::class, 'storeShop'])->name('storeShop');

        Route::post('/checkout', [ProductController::class, 'checkout'])->name('checkout');

        Route::post('/auctions/{id}/bids', [BidController::class, 'submitBid'])->name('submitBid');
    });

require __DIR__.'/auth.php';
