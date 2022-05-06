<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;

Route::get('/', [
  HomeController::class,
  'index',
])
  ->name('admin.index');

Route::resource('/orders', OrderController::class);

Route::prefix('/settings')
  ->name('admin.settings.')
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