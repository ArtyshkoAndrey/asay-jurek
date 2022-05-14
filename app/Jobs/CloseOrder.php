<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CloseOrder implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  protected Order $order;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct (Order $order, Carbon $delay)
  {
    $this->order = $order;
    $this->delay($delay);
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle (): void
  {
    if ($this->order->type_delivery === Order::DELIVERY_IN_SHOP) {
      if ($this->order->status !== Order::STATUS_CANCEL) {
        $this->cancelOrder();
      }
    }
  }

  private function cancelOrder (): void
  {
    $this->order->status = Order::STATUS_CANCEL;

    foreach ($this->order->items as $item) {
      $product        = Product::find($item->product_id);
      $product->count += $item->count;
      $product->save();
    }

    $this->order->save();
  }
}
