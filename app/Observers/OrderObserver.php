<?php

namespace App\Observers;

use App\Models\Order;
use App\Notifications\users\CreateOrderNotification;

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
    //
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
