<?php

namespace App\Jobs;

use Log;
use App\Models\User;
use App\Models\Currency;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\users\ErrorUpdateCurrenciesNotification;

class UpdateCurrencies implements ShouldQueue
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
    $response = Http::withHeaders([
      'apikey'       => config('coinlayer.key'),
      'Content-Type' => 'text/plain',
    ])
      ->get(config('coinlayer.url') . '?source=KZT');

    if ($response->successful()) {
      Log::alert($response->json());

      $data = $response->json();
      if (!$data['success']) {
        $this->notifyAdmin();
        return;
      }

      $currencies = Currency::where('short_name', '!=', 'KZT')
        ->get();

      foreach ($currencies as $currency) {
        $currency->value = $data['quotes']['KZT' . $currency->short_name];
        $currency->save();
      }
    }
    else {
      $this->notifyAdmin();
    }
  }

  public function notifyAdmin (): void
  {
    $user = User::where('email', 'artyshko.andrey@gmail.com')
      ->first();

    if ($user) {
      $user->notify(new ErrorUpdateCurrenciesNotification());
    }
  }
}
