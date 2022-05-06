<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;

Route::get('/', [
  HomeController::class,
  'index',
])
  ->name('admin.index');

Route::resource('/orders', OrderController::class);