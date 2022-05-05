<?php

namespace App\Notifications\users;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class UserRegister
 * Уведомления нового пароля и почты
 * @package App\Notifications
 */
class UserRegister extends Notification
{
  use Queueable;

  protected User $user;
  protected string $password;

  /**
   * Create a new notification instance.
   *
   * @return void
   */
  public function __construct(User $user, string $password)
  {
    $this->password = $password;
    $this->user = $user;
  }

  /**
   * Get the notification's delivery channels.
   *
   * @param mixed $notifiable
   *
   * @return array
   */
  public function via($notifiable): array
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
  public function toMail($notifiable): MailMessage
  {
    return (new MailMessage)
      ->subject('Вы успешно зарегестрировались на сайте ' . config('app.name'))
      ->greeting('Здраствуйте')
      ->line('Вы успешно зарегестрировались')
      ->line('Ваш логин: ' . $this->user->email)
      ->line('Ваш пароль: ' . $this->password)
      ->action('Просмотреть новые товары', url('/'))
      ->success();
    }

  /**
   * Get the array representation of the notification.
   *
   * @param mixed $notifiable
   *
   * @return array
   */
  public function toArray($notifiable): array
  {
    return [
      //
    ];
  }
}
