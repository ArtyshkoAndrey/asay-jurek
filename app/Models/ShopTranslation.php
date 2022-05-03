<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ShopTranslation
 *
 * @property int         $id
 * @property int         $shop_id
 * @property string      $locale
 * @property string      $street
 * @property string|null $time
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation query()
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ShopTranslation
 *         whereTime($value)
 * @mixin \Eloquent
 */
class ShopTranslation extends Model
{
  use HasFactory;

  public $timestamps = false;
  protected $fillable = [
    'street',
    'time',
  ];
}
