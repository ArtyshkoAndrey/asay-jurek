<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Setting;

class HomeController extends Controller
{
  public function index(): Response
  {
    $setting = Setting::firstWhere('name', 'index-page');
    $url = null;
    if ($setting) {
      $url = url('public/storage/img-index/' . $setting->translate('ru')->value);
    }

    $settingLink = Setting::firstWhere('name', 'index-link');
    $link = null;
    if ($settingLink) {
      $link = $settingLink->translate('ru')->value;
    }
    return Inertia::render('Users/Index', [
      'url' => $url,
      'link' => $link
    ]);
  }

  public function about(): Response
  {
    return Inertia::render('Users/About', []);
  }

  public function receiving ()
  {
    return Inertia::render('Users/Receiving', []);
  }
}