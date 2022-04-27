<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Database\Factories\UserFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotificationCollection;

/**
 * App\Models\User
 *
 * @property int                                                        $id
 * @property string                                                     $name
 * @property string                                                     $email
 * @property Carbon|null                                                $email_verified_at
 * @property string                                                     $password
 * @property string|null                                                $remember_token
 * @property Carbon|null                                                $created_at
 * @property Carbon|null                                                $updated_at
 * @property-read DatabaseNotificationCollection|DatabaseNotification[] $notifications
 * @property-read int|null                                              $notifications_count
 * @property-read Collection|PersonalAccessToken[]                      $tokens
 * @property-read int|null                                              $tokens_count
 * @method static UserFactory factory(...$parameters)
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User query()
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereName($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @mixin Eloquent
 * @property-read Collection|Cart[]                                     $cart
 * @property-read int|null                                              $cart_count
 * @property string|null                                                $photo
 * @property string|null                                                $phone
 * @property string|null                                                $address
 * @property string|null                                                $index
 * @property bool                                                       $notify
 * @method static Builder|User whereAddress($value)
 * @method static Builder|User whereIndex($value)
 * @method static Builder|User whereNotify($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePhoto($value)
 * @property-read string|null                                           $url
 */
class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  public const PATH_PHOTO = 'app/public/users/';
  /**
   * The attributes that are mass assignable.
   *
   * @var array<int, string>
   */
  protected $fillable = [
    'name',
    'email',
    'phone',
    'address',
    'photo',
    'notify',
    'index',
    'password',
  ];
  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
  ];
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'notify' => 'boolean',
  ];

  protected $appends = [
    'url',
  ];

  public function getUrlAttribute(): ?string
  {
    if ($this->photo) {
      return url('storage/users/' . $this->photo);
    }

    return null;
  }

  public function cart(): HasMany
  {
    return $this->hasMany(Cart::class);
  }

  public function cartProducts(): \Illuminate\Support\Collection
  {
    return $this->cart->map(function (Cart $cart) {
      return [
        'product' => $cart->product,
        'count' => $cart->count,
      ];
    });
  }
}
