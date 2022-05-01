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
    $products = $this->sortProducts($request, $products);

    $products = $products->paginate(10);

    return [
      'category' => $category,
      'products' => $products,
      'sort' => $request->get('sort', 'new')
    ];
  }

  private function getProductsForNewArrivals (Request $request): array
  {
    $products = Product::query();
    /** @var Builder $products */
    $products = $products->where('new', true);
    $products = $this->sortProducts($request, $products);
    $products = $products->paginate(10);

    return [
      'products' => $products,
      'sort' => $request->get('sort', 'new'),
      'is_arrivals' => true
    ];
  }

  private function getProductsForNewWeeks(Request $request): array
  {
    $products = Product::query();
    /** @var Builder $products */
    $products = $products->where('week', true);
    $products = $this->sortProducts($request, $products);
    $products = $products->paginate(10);

    return [
      'products' => $products,
      'sort' => $request->get('sort', 'new'),
      'is_week' => true
    ];
  }

  private function sortProducts(Request $request, Builder $products): Builder
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