<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\CatalogGetData;
use Illuminate\Database\Eloquent\Builder;

class CatalogController extends Controller
{
  use CatalogGetData;

  public function index(Request $request, int $category_id): Response
  {
    $data = $this->getProductsForCategory($request, $category_id);
    return Inertia::render('Users/Catalog', $data);
  }

  public function newArrivals(Request $request): Response
  {
    $data = $this->getProductsForNewArrivals($request);
    return Inertia::render('Users/Catalog', $data);
  }

  public function newWeeks (Request $request): Response
  {
    $data = $this->getProductsForNewWeeks($request);
    return Inertia::render('Users/Catalog', $data);
  }
}