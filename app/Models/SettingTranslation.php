<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\SettingTranslation
 *
 * @property int         $id
 * @property int         $setting_id
 * @property string      $locale
 * @property string|null $value
 * @method static Builder|SettingTranslation newModelQuery()
 * @method static Builder|SettingTranslation newQuery()
 * @method static Builder|SettingTranslation query()
 * @method static Builder|SettingTranslation whereId($value)
 * @method static Builder|SettingTranslation whereLocale($value)
 * @method static Builder|SettingTranslation whereSettingId($value)
 * @method static Builder|SettingTranslation whereValue($value)
 * @mixin Eloquent
 */
class SettingTranslation extends Model
{
  use HasFactory;

  public $timestamps = false;

  protected $fillable = [
    'value',
  ];
}
