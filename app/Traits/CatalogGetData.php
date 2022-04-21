<?php

namespace App\Traits;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;

trait CatalogGetData
{
  private function getProductsForCategory (int $category_id): array
  {
    $category = Category::findOrFail($category_id);
    $products = Product::whereHas('category', static function (Builder $q) use ($category) {
      $q->where('id', $category->id);
    })->paginate(10);

    return [
      'category' => $category,
      'products' => $products
    ];
  }
}