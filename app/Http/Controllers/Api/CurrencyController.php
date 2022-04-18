<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Exceptions\JsonErrorException;
use Ramsey\Collection\Exception\NoSuchElementException;

class CurrencyController extends Controller
{

  /**
   * @param Request $request
   *
   * @return \Illuminate\Http\JsonResponse
   * @throws Exception
   */
  public function getData(Request $request): \Illuminate\Http\JsonResponse
  {
    $currencies = Cache::remember(config('custom-cache.all_currencies'), 60*60*12, static function () {
      return Currency::all();
    });

    if ($currencies->count() < 3) {
      throw new JsonErrorException('На сервере отсутствуют необходимыые валюты', 501);
    }
    return JsonResponse::success([
      'currencies' => $currencies,
    ]);
  }
}