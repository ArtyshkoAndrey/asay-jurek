<?php

namespace App\Jobs;

use File;
use App\Models\ImageProduct;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class ClearRemovedImage implements ShouldQueue
{
  use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

  /**
   * Create a new job instance.
   *
   * @return void
   */
  public function __construct ()
  {
    //
  }

  /**
   * Execute the job.
   *
   * @return void
   */
  public function handle (): void
  {
    $images = ImageProduct::where('product_id', null)
      ->get();
      foreach ($images as $image) {
        File::delete('storage/app/public/img-products/' . $image->local_name);
        $image->delete();
      }
  }
}
