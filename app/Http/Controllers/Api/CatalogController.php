<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use App\Traits\CatalogGetData;

class CatalogController
{
  use CatalogGetData;

  public function index(Request $request, int $category_id): \Illuminate\Http\JsonResponse
  {
    $data = $this->getProductsForCategory($request, $category_id);

    return JsonResponse::success($data);
  }

  public function newArrivals(Request $request): \Illuminate\Http\JsonResponse
  {
    $data = $this->getProductsForNewArrivals($request);
    return JsonResponse::success($data);
  }

  public function newWeeks(Request $request): \Illuminate\Http\JsonResponse
  {
    $data = $this->getProductsForNewWeeks($request);
    return JsonResponse::success($data);
  }
}