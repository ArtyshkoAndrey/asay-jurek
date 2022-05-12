<?php

use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ShopController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\ProductController;

Route::name('admin.')
  ->group(static function () {
    Route::get('/', [
      HomeController::class,
      'index',
    ])
      ->name('index');

    Route::resource('/orders', OrderController::class)
      ->except([
        'destroy',
        'edit',
        'create',
      ]);
    Route::resource('/users', UserController::class)
      ->except([
        'destroy',
        'edit',
        'show',
      ]);
    Route::resource('/shops', ShopController::class)
      ->except([
        'edit',
        'show',
      ]);
    Route::resource('/seos', SeoController::class)
      ->except([
        'edit',
        'show',
      ]);
    Route::resource('/products', ProductController::class)
      ->except([
        'show',
      ]);
    Route::prefix('/products')
      ->name('products.')
      ->group(static function () {
        Route::post('/photos', [
          ProductController::class,
          'photo',
        ])
          ->name('photo');
        Route::delete('/photos/{id}', [
          ProductController::class,
          'photoDelete',
        ])
          ->name('photoDelete');
      });

    Route::prefix('/settings')
      ->name('settings.')
      ->group(static function () {
        Route::get('/yandex-metrics', [
          SettingController::class,
          'yandexMetrics',
        ])
          ->name('yandex-metrics');
        Route::post('yandex-metrics/save', [
          SettingController::class,
          'yandexMetricsSave',
        ]);

        Route::get('/products', [
          SettingController::class,
          'products',
        ])
          ->name('products');
        Route::post('/products', [
          SettingController::class,
          'productsSave',
        ]);

        Route::get('/index-page', [
          SettingController::class,
          'indexPage',
        ])
          ->name('index-page');
        Route::post('/index-page', [
          SettingController::class,
          'indexPageSave',
        ]);

        Route::post('/index-page/delete', [
          SettingController::class,
          'indexPageDelete',
        ]);

        Route::post('/index-page/link', [
          SettingController::class,
          'indexPageLink',
        ]);
      });
  });




