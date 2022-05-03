<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Shop;
use Inertia\Response;

class OrderController extends Controller
{
  public function index(): Response
  {
    $shops = Shop::all();
    return Inertia::render('Users/Order', [
      'shops' => $shops
    ]);
  }
}