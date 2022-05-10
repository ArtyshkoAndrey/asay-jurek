<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;

class SettingController extends Controller
{
  public function yandexMetrics (): Response
  {
    $code = Setting::getYandexMetrics();

    return Inertia::render('Admins/Settings/Yandex', [
      'code' => $code,
    ]);
  }

  public function yandexMetricsSave (Request $request): RedirectResponse
  {
    $setting = Setting::firstWhere('name', 'yandex_metrics');

    if ($setting) {
      $setting->translate('ru')->value = $request->get('code');
      $setting->save();
    }
    else {
      $setting = Setting::create([
        'name' => 'yandex_metrics',
        'ru'   => [
          'value' => $request->get('code'),
        ],
      ]);
    }

    return redirect()->route('admin.settings.yandex-metrics');
  }


  public function products (): Response
  {
    $status_product = Setting::where('name', 'status_product')->first();
    $delivery = Setting::where('name', 'delivery')->first();

    return Inertia::render('Admins/Settings/Products', [
      'delivery' => $delivery,
      'status_product' => $status_product
    ]);
  }

  public function productsSave (Request $request): RedirectResponse
  {
    $setting = Setting::firstWhere('name', 'delivery');

    if ($setting) {
      $setting->translate('ru')->value = $request->get('ru')['delivery'];
      $setting->translate('en')->value = $request->get('en')['delivery'];
      $setting->save();
    }

    else {
      $setting = Setting::create([
        'name' => 'delivery',
        'ru'   => [
          'value' => $request->get('ru')['delivery'],
        ],
        'en'   => [
          'value' => $request->get('en')['delivery'],
        ],
      ]);
    }

    $setting = Setting::firstWhere('name', 'status_product');

    if ($setting) {
      $setting->translate('ru')->value = $request->get('ru')['status_product'];
      $setting->translate('en')->value = $request->get('en')['status_product'];
      $setting->save();
    }

    else {
      $setting = Setting::create([
        'name' => 'status_product',
        'ru'   => [
          'value' => $request->get('ru')['status_product'],
        ],
        'en'   => [
          'value' => $request->get('en')['status_product'],
        ],
      ]);
    }

    return redirect()->route('admin.settings.products');
  }
}