<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\OrderItem
 *
 * @property int          $id
 * @property int          $order_id
 * @property int          $product_id
 * @property int          $count
 * @property int          $cost
 * @property Carbon|null  $created_at
 * @property Carbon|null  $updated_at
 * @property-read Order   $order
 * @property-read Product $product
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCost($value)
 * @method static Builder|OrderItem whereCount($value)
 * @method static Builder|OrderItem whereCreatedAt($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem whereProductId($value)
 * @method static Builder|OrderItem whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderItem extends Model
{
  use HasFactory;

  protected $fillable = [
    'count',
    'cost',
  ];

  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/

  /********************************************/
  /**                 RELATION                */
  /********************************************/
  public function order(): BelongsTo
  {
    return $this->belongsTo(Order::class);
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }


  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/

}
