<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\CurrencyTranslation
 *
 * @property int    $id
 * @property int    $currency_id
 * @property string $locale
 * @property string $name
 * @method static Builder|CurrencyTranslation newModelQuery()
 * @method static Builder|CurrencyTranslation newQuery()
 * @method static Builder|CurrencyTranslation query()
 * @method static Builder|CurrencyTranslation whereCurrencyId($value)
 * @method static Builder|CurrencyTranslation whereId($value)
 * @method static Builder|CurrencyTranslation whereLocale($value)
 * @method static Builder|CurrencyTranslation whereName($value)
 * @mixin Eloquent
 */
class CurrencyTranslation extends Model
{
  use HasFactory;

  public $timestamps = false;
  protected $fillable = [
    'name',
  ];
}
