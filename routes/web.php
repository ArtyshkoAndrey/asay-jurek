<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about']);
Route::get('/catalog/{category_id}', [CatalogController::class, 'index']);
Route::get('/new-arrivals', [CatalogController::class, 'newArrivals']);
Route::get('/products-weeks', [CatalogController::class, 'newWeeks']);
Route::get('/product/{product_id}', [ProductController::class, 'index']);

Route::get('/order', [OrderController::class, 'index']);
Route::post('/order/create', [OrderController::class, 'create']);

Route::middleware('auth')->group(function () {
  Route::post('/user/cart', [ProductController::class, 'userCart']);
  Route::post('/user/cart/remove', [ProductController::class, 'removeUserCart']);
  Route::post('/user/cart/add', [ProductController::class, 'addUserCart']);

  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto']);
  Route::post('/profile/update-password', [ProfileController::class, 'updatePassword']);
  Route::post('/profile/update-info', [ProfileController::class, 'updateInfo']);
  Route::get('/profile/orders', [ProfileController::class, 'orders']);
  Route::get('/profile/order/{id}', [ProfileController::class, 'order']);
});

Auth::routes();

