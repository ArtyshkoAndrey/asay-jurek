<?php

namespace App\Observers;

use File;
use App\Models\Cart;
use App\Models\Product;
use App\Models\ImageProduct;

class ProductObserver
{
  /**
   * Handle the Product "created" event.
   *
   * @param Product $product
   *
   * @return void
   */
  public function created (Product $product): void
  {
    //
  }

  /**
   * Handle the Product "updated" event.
   *
   * @param Product $product
   *
   * @return void
   */
  public function updated (Product $product): void
  {
    $carts = Cart::where('product_id', $product->id)->get();

    foreach ($carts as $cart) {
      if ($product->count === 0) {
        $cart->delete();
      }
      else if ($cart->count < $product->count) {
        $cart->count = $product->count;
        $cart->save();
      }
    }
  }

  /**
   * Handle the Product "deleted" event.
   *
   * @param Product $product
   *
   * @return void
   */
  public function deleted (Product $product): void
  {
    $carts = Cart::where('product_id', $product->id)->delete();
  }

}
