<?php

namespace App\Http\Controllers;

use Auth;
use Inertia\Inertia;
use App\Models\User;
use App\Models\Cart;
use Inertia\Response;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Helpers\JsonResponse;
use Illuminate\Support\Collection;

class ProductController extends Controller
{

  public function index(int $product_id): Response
  {
    $product = Product::with(['category', 'status', 'images'])
      ->findOrFail($product_id);

    $delivery = Setting::deliverySetting();
    $statusProduct = Setting::statusProductSetting();

    return Inertia::render('Users/Product', [
      'product' => $product,
      'delivery' => $delivery,
      'statusProduct' => $statusProduct,
    ]);
  }

  public function userCart(Request $request): \Illuminate\Http\JsonResponse
  {
    if (Auth::check()) {
      $products = $request->get('products', []);

      $products = new Collection($products);

      foreach ($products as $p) {
        $dbProduct = Product::find($p['id']);
        if (!$dbProduct) {
          $products = $products->filter(function ($product) use ($p) {
            return $product !== $p['id'];
          });
        } else {
          $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $p['id'])
            ->first();
          if ($cartItem) {
            $cartItem->count = $p['count'];
          } else {
            $cartItem = new Cart([
              'count' => $p['count']
            ]);
            $cartItem->user()->associate(Auth::id());
            $cartItem->product()->associate($p['id']);
          }
          $cartItem->save();
        }
      }
      $user = User::find(Auth::id());
      $cart = $user->cartProducts();

      return JsonResponse::success([
        'cart' => $cart,
      ]);
    }

    return JsonResponse::error([
      'message' => 'No login',
    ]);
  }

  public function removeUserCart(Request $request)
  {
    if (Auth::check()) {
      $request->validate([
        'id' => 'required|exists:products,id',
      ]);

      $id = $request->get('id');

      Cart::where('user_id', Auth::id())
        ->where('product_id', $id)->delete();

      return JsonResponse::success([
        'id' => $id
      ]);
    }

    return JsonResponse::error([
      'message' => 'No login',
    ]);
  }

  public function addUserCart(Request $request)
  {
    if (Auth::check()) {
      $request->validate([
        'id' => 'required|exists:products,id',
        'count' => 'required|integer'
      ]);

      $id = $request->get('id');
      $count = $request->get('count');

      $cartItem = Cart::where('user_id', Auth::id())
        ->where('product_id', $id)
        ->first();
      if ($cartItem) {
        $cartItem->count = $count;
      } else {
        $cartItem = new Cart([
          'count' => $count
        ]);
        $cartItem->user()->associate(Auth::id());
        $cartItem->product()->associate($id);
      }
      $cartItem->save();

      return JsonResponse::success([
        'cart_item' => $cartItem
      ]);
    }

    return JsonResponse::error([
      'message' => 'No login',
    ]);
  }

}