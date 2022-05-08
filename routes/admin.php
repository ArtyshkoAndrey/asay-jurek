<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;

Route::name('admin.')
  ->group(static function () {
    Route::get('/', [
      HomeController::class,
      'index',
    ])
      ->name('index');

    Route::resource('/orders', OrderController::class)->except(
      ['destroy', 'edit', 'create']
    );
    Route::resource('/users', UserController::class)->except(
      ['destroy', 'edit']
    );

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
      });
  });




