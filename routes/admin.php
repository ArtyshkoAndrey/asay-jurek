<?php

use App\Http\Controllers\Admin\HomeController;

Route::get('/', [HomeController::class, 'index'])
  ->name('admin.index');