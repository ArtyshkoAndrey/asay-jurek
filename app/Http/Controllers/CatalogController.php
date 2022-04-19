<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Category;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

  public function index (Request $request, int $category_id): \Inertia\Response
  {
    $category = Category::findOrFail($category_id);

    return Inertia::render('Users/Catalog', [
      'category' => $category
    ]);
  }
}