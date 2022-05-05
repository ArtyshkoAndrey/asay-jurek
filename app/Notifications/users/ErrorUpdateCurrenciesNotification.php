<?php

namespace App\Notifications\users;

use Log;
use App\Models\User;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Ramsey\Collection\Collection;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class ErrorUpdateCurrenciesNotification extends Notification
{
  use Queueable;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct ()
  {

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
    return (new MailMessage)
      ->subject('Ошибка при обновлении валюты ' . config('app.name'))
      ->greeting('Привет Создатель')
      ->line('На сайте ' . config('app.name') . ' не сработал алгорит обновления валюты')
      ->line('Тебе необхожимо это исправить, Возможно причина в API')
      ->action('Открой меня', url('/'))
      ->error();
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
