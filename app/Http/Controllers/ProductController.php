<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;
use App\Models\Product;

class ProductController extends Controller
{

  public function index(int $product_id): Response
  {
    $product = Product::with(['category', 'status', 'images'])
      ->findOrFail($product_id);

    return Inertia::render('Users/Product', [
      'product' => $product,
    ]);
  }

}