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
}