<?php

namespace App\Models;

use Eloquent;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Cart
 *
 * @property int          $id
 * @property int          $user_id
 * @property int          $product_id
 * @property int          $count
 * @property Carbon|null  $created_at
 * @property Carbon|null  $updated_at
 * @property-read Product $product
 * @property-read User    $user
 * @method static Builder|Cart newModelQuery()
 * @method static Builder|Cart newQuery()
 * @method static Builder|Cart query()
 * @method static Builder|Cart whereCount($value)
 * @method static Builder|Cart whereCreatedAt($value)
 * @method static Builder|Cart whereId($value)
 * @method static Builder|Cart whereProductId($value)
 * @method static Builder|Cart whereUpdatedAt($value)
 * @method static Builder|Cart whereUserId($value)
 * @mixin Eloquent
 */
class Cart extends Model
{
  use HasFactory;

  protected $fillable = [
    'count',
  ];

  protected $with = [
    'user',
    'product',
  ];

  /********************************************/
  /**                 ATTRIBUTES              */
  /********************************************/


  /********************************************/
  /**                 RELATION                */
  /********************************************/
  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }

  public function product(): BelongsTo
  {
    return $this->belongsTo(Product::class);
  }


  /********************************************/
  /**       Collection Helper Functions       */
  /********************************************/
}
