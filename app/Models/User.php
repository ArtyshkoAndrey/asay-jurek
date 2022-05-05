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
 * @property-read Collection|Cart[]                                     $cart
 * @property-read int|null                                              $cart_count
 * @property string|null                                                $photo
 * @property string|null                                                $phone
 * @property bool                                                       $notify
 * @property-read string|null                                           $address
 * @property-read Collection|Order[]                                    $orders
 * @property-read int|null                                              $orders_count
 * @property-read string|null                                           $url
 * @property string|null                                                $country
 * @property string|null                                                $city
 * @property string|null                                                $street
 * @property string|null                                                $post_index
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
 * @method static Builder|User whereNotify($value)
 * @method static Builder|User wherePhone($value)
 * @method static Builder|User wherePhoto($value)
 * @method static Builder|User whereCity($value)
 * @method static Builder|User whereCountry($value)
 * @method static Builder|User wherePostIndex($value)
 * @method static Builder|User whereStreet($value)
 * @mixin Eloquent
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
    'country',
    'city',
    'street',
    'photo',
    'notify',
    'post_index',
    'password',
    'is_admin',
  ];
  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array<int, string>
   */
  protected $hidden = [
    'password',
    'remember_token',
    'is_admin',
  ];
  /**
   * The attributes that should be cast.
   *
   * @var array<string, string>
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
    'notify'            => 'boolean',
    'is_admin'          => 'boolean',
  ];

  protected $appends = [
    'url',
    'address',
  ];

  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/

  public function getUrlAttribute (): ?string
  {
    if ($this->photo) {
      return url('storage/users/' . $this->photo);
    }

    return null;
  }

  public function getAddressAttribute (): ?string
  {
    if ($this->street) {
      return $this->country . ', ' . $this->city . ', ' . $this->street . ', ' . $this->post_index;
    }

    return null;
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/

  public function cart (): HasMany
  {
    return $this->hasMany(Cart::class);
  }

  public function orders (): HasMany
  {
    return $this->hasMany(Order::class);
  }


  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/

  public function cartProducts (): \Illuminate\Support\Collection
  {
    return $this->cart->map(function (Cart $cart) {
      return [
        'product' => $cart->product,
        'count'   => $cart->count,
      ];
    });
  }

}
