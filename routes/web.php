<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DatabaseController;
use Illuminate\Queue\Jobs\DatabaseJob;
use Illuminate\Support\Facades\Auth;

Route::get('/', [PageController::class, 'homePage']);
Route::get('/home', [PageController::class, 'homePage'])->name('home');
Route::get('/login', [PageController::class, 'loginPage']);
Route::get('/register', [PageController::class, 'registerPage']);
Route::get('/search', [PageController::class, 'search']);

Route::get('/product', [PageController::class, 'productPage'])->name('productPage');
Route::get('/addProduct', [PageController::class, 'addProductPage']);
Route::get('/editProduct/{id}', [PageController::class, 'editProductPage']);
Route::get('/productDetail/{id}', [PageController::class, 'productDetailPage']);

Route::get('/category', [PageController::class,'categoryPage'])->name('categoryPage');
Route::get('/addCategory',[PageController::class,'addCategoryPage']);
Route::get('/editCategory/{id}', [PageController::class, 'editCategoryPage']);

Route::get('/cart',[PageController::class, 'cartPage'])->name('cartPage');
Route::get('/editCart/{id}', [PageController::class, 'editCartPage']);

Route::get('/historyTransaction', [PageController::class, 'historyTransactionPage'])->name('transactionHistoryPage');
Auth::routes();

Route::post('/registerAccount', [DatabaseController::class, 'registerAccount'])->name('store.account');
Route::post('/add-Category',[DatabaseController::class,'addCategory'])->name('store.category');
Route::post('/edit-Category/{id}', [DatabaseController::class, 'editCategory'])->name('edit.category');
Route::post('/delete-Category/{id}',[DatabaseController::class,'deleteCategory'])->name('delete.category');
Route::post('/add-Product',[DatabaseController::class,'addProduct'])->name('store.product');
Route::post('/edit-Product/{id}',[DatabaseController::class,'editProduct'])->name('edit.product');
Route::post('/delete-Product/{id}',[DatabaseController::class,'deleteProduct'])->name('delete.product');
Route::post('/add-Cart/{id}', [DatabaseController::class, 'addToCart'])->name('add.cartItem');

Route::post('/edit-Cart/{id}', [DatabaseController::class, 'editCartItem'])->name('edit.cartItem');
Route::post('/delete-Cart/{id}', [DatabaseController::class, 'deleteCartItem'])->name('delete.cartItem');
Route::get('/checkout', [DatabaseController::class, 'checkout'])->name('checkout');
