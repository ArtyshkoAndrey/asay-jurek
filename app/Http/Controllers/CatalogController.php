<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Traits\CatalogGetData;

class CatalogController extends Controller
{
  use CatalogGetData;

  public function index (Request $request, int $category_id): \Inertia\Response
  {
    $data = $this->getProductsForCategory($request, $category_id);
    return Inertia::render('Users/Catalog', $data);
  }
}