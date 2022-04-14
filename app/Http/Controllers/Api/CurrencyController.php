<?php

namespace App\Http\Controllers\Api;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class CurrencyController extends Controller
{

  public function getData(Request $request): \Illuminate\Http\JsonResponse
  {
    $currencies = Currency::all();

    return JsonResponse::success([
      'currencies' => $currencies,
    ]);
  }
}