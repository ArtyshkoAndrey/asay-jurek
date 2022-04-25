<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use App\Models\Setting;
use App\Helpers\JsonResponse;

class ProductController extends Controller
{

  public function index(int $product_id): Response
  {
    $product = Product::with(['category', 'status', 'images'])
      ->findOrFail($product_id);

    $delivery = Setting::deliverySetting();
    $statusProduct = Setting::statusProductSetting();

    return Inertia::render('Users/Product', [
      'product' => $product,
      'delivery' => $delivery,
      'statusProduct' => $statusProduct,
    ]);
  }

  public function userCart(): \Illuminate\Http\JsonResponse
  {
    if (Auth::check()) {
      $products = Auth::user()->cartProducts();

      return JsonResponse::success([
        'cart' => $products,
      ]);
    }

    return JsonResponse::error([
      'message' => 'No login',
    ]);
  }

}