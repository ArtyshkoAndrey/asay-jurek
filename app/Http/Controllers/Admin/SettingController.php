<?php

namespace App\Http\Controllers\Admin;

use File;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Intervention\Image\Facades\Image;

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

  public function indexPage (): Response
  {
    $setting = Setting::firstWhere('name', 'index-page');
    $url = null;

    if ($setting) {
      $url = url('/public/storage/img-index/' . $setting->value);
    }

    $settingLink = Setting::firstWhere('name', 'index-link');
    $link        = $settingLink->value ?? null;

    return Inertia::render('Admins/Settings/IndexPage', [
      'setting' => $setting,
      'url' => $url,
      'link' => $link
    ]);
  }

  /**
   * @throws \Exception
   */
  public function indexPageSave (Request $request): \Illuminate\Http\JsonResponse
  {
    $file = $request->file('file');
    $name     = time() . random_int(0, 100) . '.' . $file->getClientOriginalExtension();
    Image::make($file)
      ->save(storage_path('app/public/img-index/' . $name));

    $setting = Setting::firstWhere('name', 'index-page');

    if ($setting) {
      $setting->translate('ru')->value = $name;
    } else {
      $setting = new Setting([
        'name' => 'index-page',
        'ru' => [
          'value' => $name
        ]
      ]);

    }
    $setting->save();

    return JsonResponse::success([
      'name' => url('/public/storage/img-index/' . $name)
    ]);
  }

  public function indexPageDelete(): \Illuminate\Http\JsonResponse
  {
    $setting = Setting::firstWhere('name', 'index-page');
    $status = false;
    if ($setting) {
      $status = File::delete(public_path('/storage/img-index/') . $setting->value);
      $setting->delete();
    }

    return JsonResponse::success([
      'setting' => $setting,
      'status' => $status
    ]);
  }

  public function indexPageLink (Request $request): RedirectResponse
  {
    $request->validate([
      'link' => 'required|string'
    ]);
    $setting = Setting::firstWhere('name', 'index-link');
    if ($setting) {
      $setting->translate('ru')->value = $request->get('link');
    } else {
      $setting = new Setting([
        'name' => 'index-link',
        'ru' => [
          'value' => $request->get('link')
        ]
      ]);

    }
    $setting->save();

    return redirect()->route('admin.settings.index-page');
  }
}