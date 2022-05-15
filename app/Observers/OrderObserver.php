<?php

namespace App\Observers;

use Carbon\Carbon;
use App\Models\Order;

class OrderObserver
{
  /**
   * Handle the Order "created" event.
   *
   * @param Order $order
   *
   * @return void
   */
  public function created (Order $order): void
  {

  }

  /**
   * Handle the Order "updated" event.
   *
   * @param Order $order
   *
   * @return void
   */
  public function updated (Order $order): void
  {
    // Если при обновлении заказа его статус доставлен и была оплата в магазине, то дата оплаты ставится перманентно
    if (($order->status === Order::STATUS_SUCCESS) && $order->type_delivery === Order::DELIVERY_IN_SHOP) {
      $order->payment_at = Carbon::now();
    }
  }

  /**
   * Handle the Order "deleted" event.
   *
   * @param Order $order
   *
   * @return void
   */
  public function deleted (Order $order): void
  {
    //
  }

  /**
   * Handle the Order "restored" event.
   *
   * @param Order $order
   *
   * @return void
   */
  public function restored (Order $order): void
  {
    //
  }

  /**
   * Handle the Order "force deleted" event.
   *
   * @param Order $order
   *
   * @return void
   */
  public function forceDeleted (Order $order): void
  {
    //
  }
}
