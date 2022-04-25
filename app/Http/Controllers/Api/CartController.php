<?php

namespace App\Http\Controllers\Api;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Http\Controllers\Controller;

class CartController extends Controller
{

  public function fetch(Request $request): \Illuminate\Http\JsonResponse
  {
    $request->validate([
      'ids' => 'present|array|min:0',
    ]);

    $products = Product::findMany($request->get('ids'));

    return JsonResponse::success([
      'products' => $products,
    ]);

  }
}