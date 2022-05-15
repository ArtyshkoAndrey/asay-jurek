<?php

namespace App\Jobs;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use App\Services\OrderService;
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
    $orderService = new OrderService();
    $orderService->cancel($this->order);
  }
}
