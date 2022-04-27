<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/catalog/{category_id}', [CatalogController::class, 'index']);
Route::get('/product/{product_id}', [ProductController::class, 'index']);

Route::middleware('auth')->group(function () {
  Route::post('/user/cart', [ProductController::class, 'userCart']);
  Route::post('/user/cart/remove', [ProductController::class, 'removeUserCart']);
  Route::post('/user/cart/add', [ProductController::class, 'addUserCart']);
  Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
  Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto']);
});

Auth::routes();

