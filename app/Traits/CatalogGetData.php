<?php

namespace App\Traits;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

trait CatalogGetData
{
  private function getProductsForCategory (Request $request, int $category_id): array
  {
    $category = Category::findOrFail($category_id);
    $products = Product::query();
    /** @var Builder $products */
    $products = $products->whereHas('category', static function (Builder $q) use ($category) {
      $q->where('id', $category->id);
    });
    $products = $this->sortProductsForCategory($request, $products);

    $products = $products->paginate(10);

    return [
      'category' => $category,
      'products' => $products,
      'sort' => $request->get('sort', 'new')
    ];
  }

  private function sortProductsForCategory(Request $request, Builder $products)
  {
    switch ($request->get('sort', 'new')) {
      case 'new':
        return $products->orderBy('created_at', 'desc');
      case 'lowcost':
        return $products->orderBy('cost');
      case 'hightcost':
        return $products->orderBy('cost', 'desc');
      default:
        return $products;
    }
  }
}