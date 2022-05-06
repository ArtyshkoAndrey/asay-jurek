<?php

namespace App\Http\Controllers\Admin;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
  public function yandexMetrics (): Response
  {
    $code = Setting::getYandexMetrics();

    return Inertia::render('Admins/Settings/Yandex', [
      'code' => $code,
    ]);
  }

  public function yandexMetricsSave (Request $request): \Illuminate\Http\RedirectResponse
  {
    $setting = Setting::firstWhere('name', 'yandex_metrics');

    if ($setting) {
      $setting->translate('ru')->value = $request->get('code');
      $setting->save();
    } else {
      $setting = Setting::create([
        'name' => 'yandex_metrics',
        'ru' => [
          'value' => $request->get('code')
        ]
      ]);
    }

    return redirect()->route('admin.settings.yandex-metrics');
  }
}