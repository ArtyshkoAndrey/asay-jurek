<?php

namespace App\Notifications\users;

use Log;
use App\Models\User;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Ramsey\Collection\Collection;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class CancelOrderNotification extends Notification
{
  use Queueable;

  protected User  $user;
  protected Order                                    $order;
  protected \Illuminate\Database\Eloquent\Collection $items;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct (Order $order)
  {
    $this->order = $order->load('shop');
    $this->items = $order->items()->with('product')->get();
    $this->user = $order->user;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param mixed $notifiable
   *
   * @return array
   */
  public function via ($notifiable): array
  {
    return ['mail'];
  }

  /**
   * Get the mail representation of the notification.
   *
   * @param mixed $notifiable
   *
   * @return MailMessage
   */
  public function toMail ($notifiable): MailMessage
  {
    app()->setLocale('ru');
    return (new MailMessage)
      ->subject('Ваш заказ был отменён на сайте ' . config('app.name'))
      ->markdown('mail.users.order.cancel', [
        'user' => $this->user,
        'order' => $this->order,
        'items' => $this->items
      ]);
  }

  /**
   * Get the array representation of the notification.
   *
   * @param mixed $notifiable
   *
   * @return array
   */
  public function toArray ($notifiable): array
  {
    return [
    ];
  }
}
