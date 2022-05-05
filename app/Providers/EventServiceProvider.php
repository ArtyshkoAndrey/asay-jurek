<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Currency;
use App\Models\Category;
use App\Observers\OrderObserver;
use App\Observers\ProductObserver;
use App\Observers\CurrencyObserver;
use App\Observers\CategoryObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
  /**
   * The event listener mappings for the application.
   *
   * @var array<class-string, array<int, class-string>>
   */
  protected $listen = [
    Registered::class => [
      SendEmailVerificationNotification::class,
    ],
  ];

  /**
   * Register any events for your application.
   *
   * @return void
   */
  public function boot (): void
  {
    Currency::observe(CurrencyObserver::class);
    Category::observe(CategoryObserver::class);
    Product::observe(ProductObserver::class);
    Order::observe(OrderObserver::class);
  }
}
