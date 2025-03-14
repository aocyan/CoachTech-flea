<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/sell', [ProductController::class, 'create'])->name('sell.create');
Route::post('/sell/store', [ProductController::class, 'store'])->name('sell.store');
Route::get('/purchase/{item_id}', [ProductController::class, 'index'])->name('purchase.index');
Route::get('/purchase/address/{item_id}', [ProductController::class, 'edit'])->name('purchase.address');
Route::patch('/address/update/{item_id}', [ProductController::class, 'update'])->name('address.update');
Route::post('/purchase/{product}', [ProductController::class, 'purchase'])->name('purchase.store');


Route::get('/', [ItemController::class, 'index'])->name('product');
Route::get('/item/{item_id}', [ItemController::class, 'show'])->name('product.show');
Route::post('/comments', [ItemController::class, 'store'])->name('likeComment.store');


Route::post('/register', [UserController::class, 'store'])->name('user.store');
Route::get('/mypage', [UserController::class, 'mypage'])->name('mypage.check');
Route::get('/mypage/profile', [UserController::class, 'edit'])->name('user.edit');
Route::put('/update', [UserController::class, 'update'])->name('user.update');
Route::middleware('auth')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('user.login');
});
Route::get('/login', [UserController::class, 'login']);
Route::get('/', [UserController::class, 'index'])->name('user.index');
Route::get('/register', [UserController::class, 'register']);
