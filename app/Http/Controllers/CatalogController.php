<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class CatalogController extends Controller
{

  public function index (Request $request, int $category_id): \Inertia\Response
  {
    $category = Category::findOrFail($category_id);
    $products = Product::whereHas('category', static function (Builder $q) use ($category) {
      $q->where('id', $category->id);
    })->get();

    return Inertia::render('Users/Catalog', [
      'category' => $category,
      'products' => $products
    ]);
  }
}