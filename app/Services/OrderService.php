<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use Swift_TransportException;
use App\Notifications\users\CancelOrderNotification;

class OrderService
{
  protected Order $order;

  /**
   * Отмена заказа
   *
   * @param Order $order
   *
   * @return bool
   */
  public function cancel (Order $order): bool
  {
    $this->order = $order;

    if ($this->order->status !== Order::STATUS_CANCEL) {
      if ($this->order->type_delivery !== Order::DELIVERY_IN_SHOP) {
        // Присвоение, что заказ отменён
        $this->order->status = Order::STATUS_CANCEL;

        foreach ($this->order->items as $item) {
          $product        = Product::find($item->product_id);
          $product->count += $item->count;
          $product->save();
        }

        $this->order->save();
        try {
          $this->order->user->notify(new CancelOrderNotification($this->order));
        } catch (Swift_TransportException $e) {
          \Log::critical('Dont send Email');
        }
        return true;
      }
    }

    return false;

  }

}