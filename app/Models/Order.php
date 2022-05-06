<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Order
 *
 * @property int                         $id
 * @property int|null                    $user_id
 * @property string                      $user_name
 * @property string                      $user_address
 * @property string                      $user_phone
 * @property int                         $cost
 * @property string                      $status
 * @property string                      $type_delivery
 * @property Carbon|null                 $payment_at
 * @property string|null                 $promo_code
 * @property int                         $sale
 * @property Carbon|null                 $created_at
 * @property Carbon|null                 $updated_at
 * @property-read Collection|OrderItem[] $items
 * @property-read int|null               $items_count
 * @property-read int                    $count_products
 * @property-read string                 $delivery_translation
 * @property-read string                 $status_translation
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCost($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order wherePaymentAt($value)
 * @method static Builder|Order wherePromoCode($value)
 * @method static Builder|Order whereSale($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereTypeDelivery($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserAddress($value)
 * @method static Builder|Order whereUserId($value)
 * @method static Builder|Order whereUserName($value)
 * @method static Builder|Order whereUserPhone($value)
 * @mixin Eloquent
 */
class Order extends Model
{
  use HasFactory;

  public const STATUS_NOT_PAID  = 'not_paid';
  public const STATUS_PREPARE   = 'prepare';
  public const STATUS_CANCEL    = 'cancel';
  public const STATUS_DELIVERED = 'delivered';
  public const STATUS_SUCCESS   = 'success';

  public const MAP_STATUS = [
    self::STATUS_NOT_PAID,
    self::STATUS_CANCEL,
    self::STATUS_DELIVERED,
    self::STATUS_PREPARE,
    self::STATUS_SUCCESS,
  ];
  
  public const MAP_STATUS_TRANSLATE = [
    self::STATUS_CANCEL    => 'Отменён',
    // Огда отменили заказ
    self::STATUS_NOT_PAID  => 'Не оплаченный',
    // Когда создали заказ но не оплатили и автоматически отвенится
    self::STATUS_DELIVERED => 'Отправлен',
    // После подверждения либо отправлен в доставку или выполнен
    self::STATUS_PREPARE   => 'Подтверждение',
    // После оплаты стоит на подвержлдении, админы собирают заказ
    self::STATUS_SUCCESS   => 'Выполнен'
    // Отдали заказ
  ];

  public const  DELIVERY_IN_SHOP = 'in_shop';
  public const  MAP_DELIVERY     = [
    self::DELIVERY_IN_SHOP,
  ];

  public const MAP_DELIVERY_TRANSLATE = [
    self::DELIVERY_IN_SHOP => 'Самовывоз',
  ];

  public const PAYMENT_METHOD_IN_SHOP = 'shop';
  public const PAYMENT_METHOD_ONLINE  = 'online';

  public const MAP_PAYMENT_METHODS = [
    self::PAYMENT_METHOD_IN_SHOP,
    self::PAYMENT_METHOD_ONLINE,
  ];

  public const MAP_PAYMENT_METHODS_TRANSLATE = [
    self::PAYMENT_METHOD_IN_SHOP => 'Оплата в магазине',
    self::PAYMENT_METHOD_ONLINE  => 'Онлайн оплата',
  ];

  protected $fillable = [
    'user_name',
    'user_address',
    'user_phone',
    'cost',
    'status',
    'type_delivery',
    'payment_at',
    'promo_code',
    'sale',
    'payment_method',
  ];
  protected $casts    = [
    'payment_at' => 'date:d.m.y',
    'created_at' => 'date:d.m.y',
  ];

  protected $appends = [
    'count_products',
    'delivery_translation',
    'status_translation',
  ];

  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/
  public function getCountProductsAttribute (): int
  {
    return $this->items()
      ->count();
  }


  public function items (): HasMany
  {
    return $this->hasMany(OrderItem::class);
  }

  public function getDeliveryTranslationAttribute (): string
  {
    return self::MAP_DELIVERY_TRANSLATE[$this->type_delivery];
  }

  /********************************************/
  /**                 RELATION                */
  /********************************************/
  public function getStatusTranslationAttribute (): string
  {
    return self::MAP_STATUS_TRANSLATE[$this->status];
  }

  public function user (): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function shop (): BelongsTo
  {
    return $this->belongsTo(Shop::class);
  }

  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
}
